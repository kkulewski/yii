--DROP TABLE zestaw, wynik, uprawnienia, rola, podkategoria, konto, kategoria, jezyk;

CREATE TABLE jezyk (
  id SERIAL NOT NULL PRIMARY KEY,
  nazwa VARCHAR(50) NOT NULL
);

CREATE TABLE kategoria (
  id SERIAL NOT NULL PRIMARY KEY,
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BYTEA NULL
);

CREATE TABLE podkategoria (
  id SERIAL NOT NULL PRIMARY KEY,
  kategoria_id INTEGER NOT NULL REFERENCES kategoria(id),
  nazwa VARCHAR(50) NOT NULL,
  opis TEXT NOT NULL,
  obrazek BYTEA NULL
);

CREATE TABLE konto (
  id SERIAL NOT NULL PRIMARY KEY,
  username varchar(255) NOT NULL,
  auth_key varchar(32) NOT NULL,
  password_hash varchar(255) NOT NULL,
  password_reset_token varchar(255) DEFAULT NULL,
  email varchar(255) NOT NULL,
  status INTEGER NOT NULL DEFAULT 10,
  created_at INTEGER,
  updated_at INTEGER,
  dostep INTEGER NOT NULL DEFAULT 2
);

CREATE TABLE zestaw (
  id SERIAL NOT NULL PRIMARY KEY,
  konto_id INTEGER NOT NULL REFERENCES konto(id),
  jezyk1_id INTEGER NOT NULL REFERENCES jezyk(id),
  jezyk2_id INTEGER NOT NULL REFERENCES jezyk(id),
  podkategoria_id INTEGER NOT NULL REFERENCES podkategoria(id),
  nazwa VARCHAR(200) NOT NULL,
  zestaw TEXT NOT NULL,
  ilosc_slowek INTEGER NOT NULL,
  data_dodania DATE,
  data_edycji DATE
);

CREATE TABLE wynik (
  id SERIAL NOT NULL PRIMARY KEY,
  konto_id INTEGER NOT NULL REFERENCES konto(id),
  zestaw_id INTEGER NOT NULL REFERENCES zestaw(id),
  data_wyniku DATE,
  wynik INTEGER NOT NULL
);

