# insecure-deserialization-php
## Setup
```bash
git clone https://github.com/tinkerscript/insecure-deserialization-php.git
cd insecure-deserialization-php
docker build -t insec-d-php .
docker run -p 8088:80 insec-d-php
```
Visit http://localhost:8088/
## Payloads
Safe:
```
O:4:"User":2:{s:4:"name";s:4:"John";s:8:"is_admin";b:1;}
```
Unsafe:
```
O:11:"UnsafeClass":1:{s:7:"payload";s:32:"<script>alert('hacked')</script>";}
```
