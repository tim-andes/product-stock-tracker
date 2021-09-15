# product-stock-tracker

# requirements
- Composer
- Terminal
- Internet Connection

# steps
- Download all files
- In Terminal, `cd ~/product-stock-tracker`
- In Terminal, `php artisan track` will run the command to query the retailer API and output a progress bar and table with Name, Price, Url, and if 'In_stock'. If In_stock = 0, False. 1 = True and in stock.

# notes
- The only API currently hooked in is Best Buy.
- Currently tracking Nintendo Switch (neon) and RTX 3080 (product_id: 2, mislabeled as switch)

# todo
- [ ] Fix name of RTX 3080
- [ ] Figure out easiest way to add new products
- [ ] Create server, query API's every 5 minutes
- [ ] Notify when product is in stock or has had price change
- [ ] Add Doc Blocks
