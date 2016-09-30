## SMTP module for Magento2
Magento2 module for setting up and using SMTP mail

This enables you to use any SMTP server to deliver your magento emails. This module was tested with magento versions 2.0.x and 2.1.x, but should work for all magento 2.x versions.

If you have any issues using this module, you may contact us at support@czonetechnologies.com

###Why SMTP?
Most emails delivered using sendmail (default mail daemon used for sending mails on Linux) will either get blocked by an ISP or be flagged as SPAM. 
By Using SMTP server for delivering emails, you can ensure quick and reliable delivery. Also, if you need to send out a high number of emails to your users, most hosting companies won't allow it using their shared mail servers. So, you really don't have any option if you want to send bulk emails (_For example, newsletters_) to your customers.

####1 - Installation
##### Manual Installation

 * Download the extension
 * Unzip the file
 * Create a folder {Magento root}/app/code/CzoneTech
 * Extract the contents of the zipped folder inside it.


#####Using Composer

```
composer config repositories.czone-tech composer https://repo.czonetechnologies.com
composer require czone-tech/smtp-mail
```

####2 -  Enabling the module
Using command line access to your server, run the following commands -
```
 $ php -f bin/magento module:enable --clear-static-content CzoneTech_SmtpMail
 $ php -f bin/magento setup:upgrade
```

####3 - Admin configuration
Log into your Magento Admin, then goto 
'Stores -> Configuration -> CzoneTech Modules -> Smtp Settings' 
Enter the SMTP server settings

## Screenshot
![image](https://cloud.githubusercontent.com/assets/1729518/18911185/372d6b4c-8599-11e6-926b-bca83dc0b266.png)
