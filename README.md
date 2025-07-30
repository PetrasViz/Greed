# Greed Guild Loot System

This repository contains a minimal Flask-based web application implementing
a guild loot management system. The application demonstrates the core pages
and role-based access control as described in the spec. It is intended as a
starting point to build the full functionality.

## Setup

1. Install dependencies:

```bash
pip install -r requirements.txt
```

2. Run the application:

```bash
python app.py
```

The server will start on `http://127.0.0.1:5000/`.

## User Roles

- **Admin** – full access.
- **Guild Leader** – full access except deleting users.
- **Guild Advisor** – full access except deleting users.
- **Guild Member** – access limited to main page, auctions, histories and
  personal profile management.

## Pages

- **Login/Registration** – create an account or sign in.
- **Main Page** – introduction and short tutorial.
- **Auctions** – list active auctions.
- **Auction History** – past auctions and results.
- **Event History** – records of guild events.
- **Profile** – edit email, display name and in-game role.
- **Management** – administrative section for managing auctions, events and
  user permissions (only visible to non-member roles).

This repository currently provides the basic page structure and simple
role-based access checks but omits the full auction and event logic.
