#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


if [ ! -e "$DIR/data/config.php" ]; then
  cp "$DIR/data/config.example.php" "$DIR/data/config.php"
fi

docker run --rm -it --name "ctm.dev" \
  -v "$DIR:/usr/src/ctm.dev" \
  -w "/usr/src/ctm.dev" \
  -p "127.0.0.1:8000:8000" \
  -u "$(id -u):$(id -g)" \
  php:7-alpine \
  php --server "0.0.0.0:8000" --docroot "web/"
