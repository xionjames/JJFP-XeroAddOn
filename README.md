# JJFP-XeroAddOn
Vanhackathon Challenge - Xero Add On

# System Requirements
### Xero Addon (Backend, API)
  * OS: Any. *I have to be honest, I just tested it on Ubuntu 18.04 with kernel 5.0.0-36*
  * MongoDB >= 3.6
  * OpenSSL
  * PHP >= 7.2
  * Composer
  * PHP Enabled Modules:
    * php-mbstring
    * php-curl
    * php-xml
    * php-mongodb

#### You can use `install.php` script in order to install dependencies.

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

Set up Xero OAuth credentials on `cfg/app.ini`

```
[xero]
key=your_key
secret=your_secret
certificate=xero/privatekey.pem
callback=http://localhost/
```

Variable `certificate` can keep with that value.

**Note:** This application supports Xero OAuth 1.0 authentication, for *Private Apps*. So, you must generate one certificate in order to create the *App* in depeloper.xero.com.
If you are using Windows, please follow instructions in xero website.
If you are using Linux, you can generate this certificate with the following script

```
$ cd xero-addon
$ cd cfg/xero
$ chmod a+x generate_cert.sh
$ ./generate_cert.sh
```

Now, to run the project, just use php command line to start a server with `api/graphql.php` file

```
$ cd xero-addon
$ cd api
$ php -S localhost:8080 graphql.php
```

Enjoy it!

### Xero UI (Frontend)
First, it is necessary set the GraphQL API URL. For this, just edit the `xero-ui/src/index.js` file and change the following lines

```
const client = new ApolloClient({
  uri: 'http://127.0.0.1:8080'
});
```

But... you have to change this URL in another file (Yes, I know it, I forgot to remove this code and just keep one initialisation but at this moment I’m unable to do it. So, I’m editing README file with my phone).

Edit the `xero-ui/src/components/Navbar.jsx` file too, please.

Now, let’s start the project.

Go to frontend path

`$ cd xero-ui`

Refresh nodejs packages

`$ npm install`

Start server

`$ npm start`

If webpage doesn't launch, just use your browser and navigate to

`http://localhost:3000`
