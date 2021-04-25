#!/bin/bash
rm nohup.out
export MALLOC_ARENA_MAX=1
nohup ./bitcoind -dbcache=450 -maxmempool=500 -maxconnections=15 -printtoconsole -rpcuser=gb -rpcpassword=testando -prune=2200 -deprecatedrpc=accounts -walletnotify="/var/www/html/app/Currency/WalletNotify/Unix/walletnotify.sh bch %s" -blocknotify="/var/www/html/app/Currency/BlockNotify/Unix/blocknotify.sh bch %s" & disown