#!/bin/bash
rm nohup.out
export MALLOC_ARENA_MAX=1
nohup ./litecoind -dbcache=450 -maxmempool=500 -maxconnections=15 -printtoconsole -rpcuser=gb -rpcpassword=testando -rpcport=23555 -prune=2200 -deprecatedrpc=accounts -addresstype=legacy -walletnotify="/var/www/html/app/Currency/WalletNotify/Unix/walletnotify.sh ltc %s" -blocknotify="/var/www/html/app/Currency/BlockNotify/Unix/blocknotify.sh ltc %s" & disown