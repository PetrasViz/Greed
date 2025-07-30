from flask import Flask, render_template, redirect, url_for, request, flash
from flask_login import LoginManager, UserMixin, login_user, logout_user, login_required, current_user
from flask_sqlalchemy import SQLAlchemy
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config['SECRET_KEY'] = 'change-me'
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///greed.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

login_manager = LoginManager(app)
login_manager.login_view = 'login'

db = SQLAlchemy(app)

with app.app_context():
    db.create_all()

class Role:
    ADMIN = 'admin'
    LEADER = 'leader'
    ADVISOR = 'advisor'
    MEMBER = 'member'

class User(UserMixin, db.Model):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True, nullable=False)
    password_hash = db.Column(db.String(128))
    email = db.Column(db.String(120))
    display_name = db.Column(db.String(80))
    role = db.Column(db.String(20), default=Role.MEMBER)
    game_role = db.Column(db.String(20))  # tank, dps, healer etc.

    def set_password(self, password):
        self.password_hash = generate_password_hash(password)

    def check_password(self, password):
        return check_password_hash(self.password_hash, password)

@login_manager.user_loader
def load_user(user_id):
    return User.query.get(int(user_id))

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        user = User.query.filter_by(username=request.form['username']).first()
        if user and user.check_password(request.form['password']):
            login_user(user)
            return redirect(url_for('index'))
        flash('Invalid credentials')
    return render_template('login.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        username = request.form['username']
        if User.query.filter_by(username=username).first():
            flash('Username already exists')
            return redirect(url_for('register'))
        user = User(username=username, email=request.form['email'], role=request.form.get('role', Role.MEMBER))
        user.set_password(request.form['password'])
        db.session.add(user)
        db.session.commit()
        login_user(user)
        return redirect(url_for('index'))
    return render_template('register.html')

@app.route('/logout')
@login_required
def logout():
    logout_user()
    return redirect(url_for('index'))

@app.route('/auctions')
@login_required
def auctions():
    return render_template('auctions.html')

@app.route('/auction_history')
@login_required
def auction_history():
    return render_template('auction_history.html')

@app.route('/event_history')
@login_required
def event_history():
    return render_template('event_history.html')

@app.route('/profile', methods=['GET', 'POST'])
@login_required
def profile():
    if request.method == 'POST':
        current_user.email = request.form['email']
        current_user.display_name = request.form['display_name']
        current_user.game_role = request.form['game_role']
        db.session.commit()
        flash('Profile updated')
    return render_template('profile.html')

# Management routes

def management_required(f):
    from functools import wraps
    @wraps(f)
    def decorated(*args, **kwargs):
        if current_user.role == Role.MEMBER:
            flash('Access denied')
            return redirect(url_for('index'))
        return f(*args, **kwargs)
    return decorated

@app.route('/management')
@login_required
@management_required
def management():
    return render_template('management.html')

@app.route('/management/auctions')
@login_required
@management_required
def manage_auctions():
    return render_template('manage_auctions.html')

@app.route('/management/events')
@login_required
@management_required
def manage_events():
    return render_template('manage_events.html')

@app.route('/management/register_event')
@login_required
@management_required
def register_event():
    return render_template('register_event.html')

@app.route('/management/users')
@login_required
def manage_users():
    if current_user.role != Role.ADMIN:
        flash('Access denied')
        return redirect(url_for('management'))
    return render_template('manage_users.html')

if __name__ == '__main__':
    app.run(debug=True)
