# JJFP-XeroAddOn
Vanhackathon Challenge - Xero Add On

# System Requirements
### Xero Addon (Backend, API)
  * OS: Any. *I have to be honest, I just tested it on Ubuntu 18.04 with kernel 5.0.0-36*
  * MongoDB >= 3.6
  * OpenSSL
  * PHP >= 7.2
  * PHP Enabled Modules:
    * php-mbstring
    * php-curl
    * php-xml
    * php-mongodb

### Xero UI (Frontend)
  * NodeJS / npm >= 6.0

# Install Instructions
You must install from and back separatelly.

### Xero Addon (Backend, API)
Setup MongoDB variables on `cfg/app.ini`

```
[mongo]  
host=localhost  
database=dbname
user=username
password=password  
```

### Xero UI (Frontend)
Go to frontend path

`$ cd xero-ui`

Refresh nodejs packages

`$ npm install`

Start server

`$ npm start`

If webpage doesn't launch, just use your browser and navigate to

`http://localhost:3000`

