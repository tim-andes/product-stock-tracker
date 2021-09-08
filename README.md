# product-stock-tracker

# requirements
- Composer
- Terminal
- Internet Connection

# steps
- Download all files
- In Terminal, `cd ~/product-stock-tracker`
- In Terminal, `php artisan track`

# notes
- The only API currently hooked in is Best Buy.
- Currently tracking Nintendo Switch (neon) and RTX 3080 (product_id: 2, mislabeled as switch)

# todo
- [ ] Fix name of RTX 3080
- [ ] Figure out easiest way to add new products
- [ ] Create server, query API's every 5 minutes
- [ ] Notify when product is in stock or has had price change
