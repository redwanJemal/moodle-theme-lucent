# Lucent — Premium Mobile-First Moodle Theme

<p align="center">
  <img src="screenshots/lucent-banner.png" alt="Lucent Theme Banner" width="100%">
</p>

**Lucent** is a premium, mobile-first Moodle theme that transforms your learning platform into a modern, app-like experience. Built on top of Moodle's Boost theme, Lucent offers a beautiful glass-effect design, smooth animations, dark mode support, and a mobile experience that rivals native apps.

---

## ✨ Features

### 🎨 Design
- **Glass-effect Navigation** — Frosted blur navbar with three header style options (Glass, Solid, Transparent)
- **Modern Typography** — Responsive font sizing with `clamp()`, 8 Google Font options
- **Premium Course Cards** — Three card styles (Rounded, Sharp, Gradient) with hover animations
- **Dark Mode** — Full dark theme with carefully chosen colours for reduced eye strain
- **Skeleton Loading States** — Beautiful loading animations for a polished feel
- **Smooth Page Transitions** — Content fades in with staggered animations
- **Custom Scrollbar** — Thin, elegant scrollbar styling

### 📱 Mobile-First
- **Bottom Navigation Bar** — Fixed 5-icon mobile nav (Home, Courses, Search, Notifications, Profile) like a native app
- **Touch-Friendly Targets** — All interactive elements meet 44px minimum tap target
- **Swipe-Friendly Course Cards** — Horizontal scroll course cards on mobile
- **Mobile Bottom-Sheet Modals** — Modals slide up from the bottom like iOS sheets
- **Improved Mobile Drawer** — Smooth slide-in sidebar with quick-action grid
- **Full-Width Mobile Forms** — 16px font size inputs to prevent iOS zoom
- **Responsive Tables** — Horizontal scroll for data tables on small screens
- **Safe Area Support** — Proper padding for iPhone notch/home indicator

### ⚙️ Customization
- **Brand Colours** — Primary, secondary, and success colour pickers
- **Font Selection** — 8 premium Google Fonts for body and headings
- **Header Style** — Glass (frosted blur), Solid, or Transparent
- **Course Card Style** — Rounded, Sharp, or Gradient overlay
- **Social Media Links** — Facebook, Twitter/X, Instagram, LinkedIn, YouTube
- **Footer Columns** — Choose 1–4 column layout
- **Custom CSS/SCSS** — Inject custom styles without editing files
- **Google Analytics** — Built-in GA4 and Universal Analytics support
- **Mobile Bottom Nav** — Enable/disable the app-like bottom navigation
- **Login Page** — Custom background, logo, heading, and subheading
- **Background Image** — Full-page background support

### 🏗️ Template Overrides
- Custom `navbar.mustache` with animated hamburger menu
- Modern `footer.mustache` with social links and multi-column layout
- Enhanced `drawers.mustache` with mobile bottom nav bar
- Premium `primary-drawer-mobile.mustache` with quick-action grid
- Override `block_myoverview/view-cards.mustache` for premium course cards

---

## 📋 Requirements

| Requirement | Version |
|-------------|---------|
| Moodle | 4.4+ (Build 2024042200) |
| PHP | 8.1+ |
| Theme Boost | Must be installed (ships with Moodle) |

---

## 🚀 Installation

### Method 1: Upload via Moodle Admin
1. Download the `lucent` theme folder as a ZIP file
2. Go to **Site administration → Plugins → Install plugins**
3. Upload the ZIP file and follow the prompts
4. Navigate to **Site administration → Appearance → Themes → Theme selector**
5. Select **Lucent** as your active theme

### Method 2: Manual Installation
1. Copy the `lucent` folder to your Moodle installation:
   ```bash
   cp -r lucent /path/to/moodle/theme/
   ```
2. Visit your Moodle site as an admin — the upgrade notification will appear
3. Follow the on-screen instructions to complete installation
4. Navigate to **Site administration → Appearance → Themes → Theme selector**
5. Choose **Lucent**

### Method 3: Git Clone
```bash
cd /path/to/moodle/theme/
git clone https://github.com/your-org/moodle-theme-lucent.git lucent
```
Then visit your site as admin to trigger the install.

---

## ⚙️ Configuration Guide

After installation, configure Lucent at:
**Site administration → Appearance → Themes → Lucent**

### General Tab
| Setting | Description | Default |
|---------|-------------|---------|
| Brand colour | Primary accent colour | `#6366f1` (Indigo) |
| Secondary colour | Muted UI colour | `#64748b` (Slate) |
| Success colour | Progress & completion | `#10b981` (Emerald) |
| Body font | Primary typeface | Inter |
| Heading font | Font for h1–h6 | Same as body |

### Appearance Tab
| Setting | Description | Default |
|---------|-------------|---------|
| Logo | Header logo (PNG/SVG) | — |
| Compact logo | Mobile/collapsed logo | — |
| Favicon | Browser tab icon | — |
| Header style | Glass / Solid / Transparent | Glass |
| Course card style | Rounded / Sharp / Gradient | Rounded |
| Dark mode | Enable dark mode toggle | On |

### Login Page Tab
| Setting | Description | Default |
|---------|-------------|---------|
| Background image | Login page background | Gradient |
| Login logo | Prominent login logo | — |
| Login heading | Welcome text | "Welcome Back" |
| Login subheading | Tagline text | "Sign in to continue…" |

### Mobile Tab
| Setting | Description | Default |
|---------|-------------|---------|
| Bottom navigation | Show app-like bottom nav | On |

### Footer Tab
| Setting | Description | Default |
|---------|-------------|---------|
| Footer columns | Number of footer columns | 4 |
| Footer text | Custom footer content | — |

### Social Media Tab
| Setting | Description |
|---------|-------------|
| Facebook URL | Link to Facebook page |
| Twitter / X URL | Link to Twitter/X profile |
| Instagram URL | Link to Instagram |
| LinkedIn URL | Link to LinkedIn page |
| YouTube URL | Link to YouTube channel |

### Advanced Tab
| Setting | Description |
|---------|-------------|
| Custom SCSS | SCSS rules compiled with theme |
| Custom CSS | Raw CSS injected on all pages |
| Google Analytics ID | GA4 or UA measurement ID |
| Background image | Full-page background |

---

## 📸 Screenshots

<p align="center">
  <em>Screenshots will be added before release</em>
</p>

| View | Description |
|------|-------------|
| `screenshots/dashboard.png` | Dashboard with premium course cards |
| `screenshots/mobile-nav.png` | Mobile bottom navigation bar |
| `screenshots/login.png` | Premium login page |
| `screenshots/dark-mode.png` | Dark mode enabled |
| `screenshots/course-page.png` | Course page with sidebar |
| `screenshots/mobile-drawer.png` | Mobile navigation drawer |

---

## 🔧 Development

### File Structure
```
lucent/
├── config.php              # Theme configuration
├── version.php             # Version & dependencies
├── lib.php                 # SCSS callbacks & helpers
├── settings.php            # Admin settings
├── lang/en/                # English language strings
│   └── theme_lucent.php
├── layout/
│   └── login.php           # Custom login layout
├── scss/
│   ├── pre.scss            # SCSS variables (before Boost)
│   ├── main.scss           # Main styles (55KB+ of premium CSS)
│   └── post.scss           # Post-compilation overrides
├── templates/
│   ├── navbar.mustache     # Glass-effect navbar
│   ├── footer.mustache     # Modern footer
│   ├── drawers.mustache    # Layout with bottom nav
│   ├── primary-drawer-mobile.mustache  # Mobile drawer
│   └── block_myoverview/
│       └── view-cards.mustache  # Premium course cards
├── screenshots/            # Theme screenshots
└── README.md               # This file
```

### Purging Caches
After making changes:
```bash
php admin/cli/purge_caches.php
```
Or via admin: **Site administration → Development → Purge caches**

---

## 🤝 Support

- **Documentation**: See this README and inline setting descriptions
- **Bug Reports**: Open an issue on GitHub
- **Feature Requests**: Open a discussion on GitHub
- **Email Support**: support@lucenttheme.com

### Compatibility
Lucent is tested with:
- Moodle 4.4, 4.5
- PHP 8.1, 8.2, 8.3
- MySQL 8.0+, MariaDB 10.6+, PostgreSQL 14+
- All modern browsers (Chrome, Firefox, Safari, Edge)
- iOS Safari, Android Chrome

---

## 📄 License

Lucent is licensed under the **GNU General Public License v3.0** (GPL-3.0).

```
Copyright (C) 2025 Lucent Theme

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <https://www.gnu.org/licenses/>.
```

---

## 🏆 Credits

- Built on [Moodle Boost](https://moodle.org/) theme framework
- Typography by [Google Fonts](https://fonts.google.com/) (Inter, Poppins, DM Sans, etc.)
- Icons by [Font Awesome](https://fontawesome.com/) (included with Moodle)
- Design inspired by modern SaaS and mobile app interfaces

---

<p align="center">
  Made with ❤️ for educators and learners
</p>
