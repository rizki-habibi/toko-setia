-- Blueprint skema relasional Toko Setia (bukan pengganti Laravel migrations).
-- Gunakan migration Laravel untuk constraint, foreign key, timestamp, dan rollback.
CREATE TABLE categories (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(120) NOT NULL,
  slug VARCHAR(140) NOT NULL UNIQUE,
  description TEXT NULL,
  icon VARCHAR(80) NULL,
  is_active BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE services (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  provider_id BIGINT UNSIGNED NOT NULL,
  category_id BIGINT UNSIGNED NOT NULL,
  title VARCHAR(180) NOT NULL,
  slug VARCHAR(200) NOT NULL UNIQUE,
  summary VARCHAR(280) NOT NULL,
  description TEXT NOT NULL,
  price_from DECIMAL(12,2) NOT NULL DEFAULT 0,
  estimated_days SMALLINT UNSIGNED NOT NULL DEFAULT 1,
  status VARCHAR(24) NOT NULL DEFAULT 'draft',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  INDEX services_category_status_idx (category_id, status),
  INDEX services_provider_status_idx (provider_id, status),
  CONSTRAINT services_category_fk FOREIGN KEY (category_id) REFERENCES categories(id)
);
