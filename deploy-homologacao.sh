#!/bin/bash

echo "Conectando no gitlab... e fazendo pull a partir da branch develop"

git pull "https://francisco.valadares:ribeiro1@gitlab.cfc.org.br/cfc/projeto-src.git" develop

docker compose -f docker-compose.homologacao.yml down

docker compose -f docker-compose.homologacao.yml up --build -d
#docker compose -f docker-compose.homologacao.yml up -d
