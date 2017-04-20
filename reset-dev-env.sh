#! /bin/bash

sed -i "s#\\@vendor.*#\\@vendor: \\@vendor#" $PWD/raw/config/auth.yml
sed -i "s#\\@hub-product*#\\@hub-product: \\@hub-product#" $PWD/raw/config/auth.yml
sed -i "s#HOST#172.20.0.1#" $PWD/raw/config/database.yml
sed -i "s#USERNAME#genee#" $PWD/raw/config/database.yml
sed -i "s#PASSWORD#83719730#" $PWD/raw/config/database.yml
sed -i "s#client_id: client_id#client_id: mall-hub-node#" $PWD/raw/config/gapper.yml
sed -i "s#client_secret: client_secret#client_secret: mall-hub-node#" $PWD/raw/config/gapper.yml
sed -i "s#gapper.in#gapper-server.service.lm.com#" $PWD/raw/config/gapper.yml
