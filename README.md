# Entegrasyon

Bu proje, PHP 8.x kullanarak pazaryeri siparişlerinin senkronizasyonu ve kargo entegrasyonlarını hedefleyen basit bir REST API iskeletidir.

## Kurulum

1. PHP 8 ve MySQL kurulu olmalıdır.
2. `composer install` komutunu çalıştırarak bağımlılıkları yükleyin.
3. `config/config.php` dosyasındaki veritabanı ayarlarını düzenleyin.
4. `database.sql` dosyasındaki tabloları oluşturun.

## Kullanım

- `public/index.php` dosyası API için giriş noktasıdır.
- `cron/fetch_orders.php` dosyası, pazaryerlerinden sipariş çekmek için çalıştırılabilir.

Bu iskelet proje geliştirmeye açıktır. Servis sınıflarındaki `TODO` kısımları doldurarak entegrasyonları tamamlayabilirsiniz.
