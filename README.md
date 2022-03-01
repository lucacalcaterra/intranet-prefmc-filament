# Note

Comando per importare gli utenti (solo attivi)
```console
php artisan ldap:import -f "(!(userAccountControl:1.2.840.113556.1.4.803:=2))"
```
 
