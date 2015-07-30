# Magento - Google page speed cache flush from admin Area

This module add a button to Magento cache page, 
When clicked it will trigger a curl request to the current http_host with 
[schema]://[host_name]/* PURGE

You need to configure page speed to accept PURGE commands.
https://developers.google.com/speed/pagespeed/module/system

## Apache:
```
ModPagespeedEnableCachePurge on
ModPagespeedPurgeMethod PURGE
```

## Nginx:
```
pagespeed EnableCachePurge on;
pagespeed PurgeMethod PURGE;
```

PageSpeed is minimu version of 1.9.32.1

