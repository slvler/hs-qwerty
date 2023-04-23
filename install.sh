#!/bin/bash


REDBg=$'\e[0;41m'
GREENBg=$'\e[0;42m'
YELLOWBg=$'\e[0;43m'
NC=$'\e[0m'

echo "${REDBg} Kurulum Başladı ${NC}"

echo "${GREENBg} Env Dosyası Oluşturuluyor ${NC}"
cp .env.example .env
echo "${YELLOWBg} Env Dosyası Oluşturuldu ${NC}"
sleep 1

echo "${GREENBg} Docker Oluşturuluyor ${NC}"
docker-compose -f docker-compose.yml up -d --build
echo "${YELLOWBg} Docker Oluşturuldu ${NC}"
sleep 1

echo "${GREENBg} Composer Yükleniyor ${NC}"
docker-compose exec laravel-example composer install
echo "${YELLOWBg} Composer Yüklendi ${NC}"
sleep 1

echo "${GREENBg} Key Oluşturuluyor ${NC}"
docker-compose exec laravel-example php artisan key:generate
echo "${YELLOWBg} Key Oluşturuldu ${NC}"
sleep 1

echo "${GREENBg} Migrate Çalıştırılıyor ${NC}"
docker-compose exec laravel-example php artisan migrate --seed
echo "${YELLOWBg} Migrate Çalıştırıldı ${NC}"


echo "${GREENBg} Cache Siliniyor ${NC}"
docker-compose exec laravel-example php artisan cache:clear
echo "${YELLOWBg} Cache Temizlendi ${NC}"

echo "${REDBg} Kurulum Tamamlandı ${NC}"