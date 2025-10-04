# TASK 1

## Folder Structure
```
user-products-plugin/
├── user-products-plugin.php     ← Main plugin file (entry point)
├── includes/
│   ├── cpt-user-products.php    ← Registers Custom Post Type: 'user_products'
│   └── rest-endpoints.php       ← Registers the custom REST API endpoint
├── admin/
│   └── settings-page.php        ← Admin settings UI for entering user ID
├── api-client.php               ← Fetches data from CodeIgniter API
└── README.md                    ← Optional: Describe plugin usage/setup
```

### Output
http://localhost:8010/wp-json/my-api/v1/user/1/products  
```json
{
  "data": [
    {
      "id": "1",
      "name": "Alpha Gadget",
      "sku": "SKU-001",
      "image": "https://example.com/images/alpha.png",
      "description": "First sample gadget.",
      "created_at": "2025-10-04 06:27:37",
      "updated_at": "2025-10-04 06:27:37",
      "user_id": "1"
    },
    {
      "id": "2",
      "name": "Beta Gadget",
      "sku": "SKU-002",
      "image": "https://example.com/images/beta.png",
      "description": "Second sample gadget.",
      "created_at": "2025-10-04 06:27:37",
      "updated_at": "2025-10-04 06:27:37",
      "user_id": "1"
    },
    {
      "id": "3",
      "name": "Gamma Gadget",
      "sku": "SKU-003",
      "image": "https://example.com/images/gamma.png",
      "description": "Third sample gadget.",
      "created_at": "2025-10-04 06:27:37",
      "updated_at": "2025-10-04 06:27:37",
      "user_id": "1"
    }
  ]
}
```

---

# TASK 2

## Structure
```
static-site/
├── src/
│   ├── pages/
│   │   └── user-products.js       ← React component page that fetches & displays products
│   └── styles/
│       └── user-products.scss     ← All styles here using SCSS
├── gatsby-config.js               ← Gatsby config (plugins, sources, etc.)
├── gatsby-node.js
├── package.json                   ← With required dependencies
├── package-lock.json              ← Locked for consistent builds
├── README.md                      ← Local run instructions (optional, but recommended)
└── .env                           ← (Optional) If you're using environment variables
```

## How to Run

### Run Gatsby
```bash
cd static-site
npm install
npm run develop
```

### Visit
http://localhost:8000/user-products

---

## Fetch from WordPress Custom API
```bash
GET http://localhost:8010/wp-json/my-api/v1/user/:id/products
```

---

## Display
- **On desktop:** 3-column grid layout  
- **On mobile:** 1-column stacked layout  

### Each product card should show:
- Name  
- Image  
- SKU  
- Description  

---

## Output:
<img width="415" height="758" alt="image" src="https://github.com/user-attachments/assets/7b0b8b12-4753-42e4-9732-fe3fcc2be290" />


## Bonus Task: Legacy Code Improvements (Security Focus)

### Issues Identified in CodeIgniter 3 App:
- No input validation/sanitization – prone to SQL Injection & XSS.
- No authentication middleware – all endpoints publicly accessible.
- Hardcoded credentials / tokens – no .env usage or secrets management.
- No HTTPS enforcement – all API traffic is unencrypted.
- No rate limiting or brute-force protection – vulnerable to abuse.

### Recommended Improvements:
- Use form validation and sanitize all inputs.
- Implement middleware for authentication (e.g. token validation).
- Store sensitive values in environment variables, not in code.
- Enforce HTTPS and enable CORS only for trusted origins.
- Add rate limiting to APIs to prevent abuse.
