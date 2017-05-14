--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.4
-- Dumped by pg_dump version 9.5.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: jezyk; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE jezyk (
    id integer NOT NULL,
    nazwa character varying(50) NOT NULL
);


ALTER TABLE jezyk OWNER TO kkulewski;

--
-- Name: jezyk_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE jezyk_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE jezyk_id_seq OWNER TO kkulewski;

--
-- Name: jezyk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE jezyk_id_seq OWNED BY jezyk.id;


--
-- Name: kategoria; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE kategoria (
    id integer NOT NULL,
    nazwa character varying(50) NOT NULL,
    opis text NOT NULL,
    obrazek bytea
);


ALTER TABLE kategoria OWNER TO kkulewski;

--
-- Name: kategoria_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE kategoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE kategoria_id_seq OWNER TO kkulewski;

--
-- Name: kategoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE kategoria_id_seq OWNED BY kategoria.id;


--
-- Name: konto; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE konto (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255) DEFAULT NULL::character varying,
    email character varying(255) NOT NULL,
    status integer DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    dostep integer DEFAULT 2 NOT NULL
);


ALTER TABLE konto OWNER TO kkulewski;

--
-- Name: konto_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE konto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE konto_id_seq OWNER TO kkulewski;

--
-- Name: konto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE konto_id_seq OWNED BY konto.id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE migration OWNER TO kkulewski;

--
-- Name: podkategoria; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE podkategoria (
    id integer NOT NULL,
    kategoria_id integer NOT NULL,
    nazwa character varying(50) NOT NULL,
    opis text NOT NULL,
    obrazek bytea
);


ALTER TABLE podkategoria OWNER TO kkulewski;

--
-- Name: podkategoria_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE podkategoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE podkategoria_id_seq OWNER TO kkulewski;

--
-- Name: podkategoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE podkategoria_id_seq OWNED BY podkategoria.id;


--
-- Name: user; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE "user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255) NOT NULL,
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL
);


ALTER TABLE "user" OWNER TO kkulewski;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO kkulewski;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- Name: wynik; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE wynik (
    id integer NOT NULL,
    konto_id integer NOT NULL,
    zestaw_id integer NOT NULL,
    data_wyniku date,
    wynik integer NOT NULL
);


ALTER TABLE wynik OWNER TO kkulewski;

--
-- Name: wynik_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE wynik_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE wynik_id_seq OWNER TO kkulewski;

--
-- Name: wynik_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE wynik_id_seq OWNED BY wynik.id;


--
-- Name: zestaw; Type: TABLE; Schema: public; Owner: kkulewski
--

CREATE TABLE zestaw (
    id integer NOT NULL,
    konto_id integer NOT NULL,
    jezyk1_id integer NOT NULL,
    jezyk2_id integer NOT NULL,
    podkategoria_id integer NOT NULL,
    nazwa character varying(200) NOT NULL,
    zestaw text NOT NULL,
    ilosc_slowek integer NOT NULL,
    data_dodania date,
    data_edycji date
);


ALTER TABLE zestaw OWNER TO kkulewski;

--
-- Name: zestaw_id_seq; Type: SEQUENCE; Schema: public; Owner: kkulewski
--

CREATE SEQUENCE zestaw_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE zestaw_id_seq OWNER TO kkulewski;

--
-- Name: zestaw_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: kkulewski
--

ALTER SEQUENCE zestaw_id_seq OWNED BY zestaw.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY jezyk ALTER COLUMN id SET DEFAULT nextval('jezyk_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY kategoria ALTER COLUMN id SET DEFAULT nextval('kategoria_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY konto ALTER COLUMN id SET DEFAULT nextval('konto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY podkategoria ALTER COLUMN id SET DEFAULT nextval('podkategoria_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY wynik ALTER COLUMN id SET DEFAULT nextval('wynik_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw ALTER COLUMN id SET DEFAULT nextval('zestaw_id_seq'::regclass);


--
-- Data for Name: jezyk; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY jezyk (id, nazwa) FROM stdin;
1	polski
2	angielski
3	niemiecki
\.


--
-- Name: jezyk_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('jezyk_id_seq', 3, true);


--
-- Data for Name: kategoria; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY kategoria (id, nazwa, opis, obrazek) FROM stdin;
1	zwierzęta	różne zwierzęta	\N
2	rośliny	Kategoria z roślinami	\N
\.


--
-- Name: kategoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('kategoria_id_seq', 2, true);


--
-- Data for Name: konto; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY konto (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, dostep) FROM stdin;
1	admin	Ne_95xOyYRQE7-t_CipgrfJlKFm3Acmt	$2y$13$KhncwoNPIs9.C/li8QOrU.TcO496FCeP2mnpXGGs8tDVRnqM5kzu2	\N	admin@admin.pl	10	1494795920	1494795920	1
2	testuser	_LEUqse3cT-Si-ear3_vexDpgN_QRIOQ	$2y$13$aATfu6zparguEvegllybneZgp7nADDqyeaAidsACa87u35f2O9ab6	\N	testuser@test.pl	10	1494796183	1494796183	2
\.


--
-- Name: konto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('konto_id_seq', 2, true);


--
-- Data for Name: migration; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY migration (version, apply_time) FROM stdin;
m000000_000000_base	1494794915
m130524_201442_init	1494794919
\.


--
-- Data for Name: podkategoria; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY podkategoria (id, kategoria_id, nazwa, opis, obrazek) FROM stdin;
1	1	zwierzęta domowe	różne zwierzęta domowe	\N
2	2	warzywa	wszelkie warzywa tu	\N
3	2	owoce	różne owoce	\N
\.


--
-- Name: podkategoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('podkategoria_id_seq', 3, true);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY "user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at) FROM stdin;
\.


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


--
-- Data for Name: wynik; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY wynik (id, konto_id, zestaw_id, data_wyniku, wynik) FROM stdin;
1	1	1	2017-05-14	60
\.


--
-- Name: wynik_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('wynik_id_seq', 1, true);


--
-- Data for Name: zestaw; Type: TABLE DATA; Schema: public; Owner: kkulewski
--

COPY zestaw (id, konto_id, jezyk1_id, jezyk2_id, podkategoria_id, nazwa, zestaw, ilosc_slowek, data_dodania, data_edycji) FROM stdin;
1	1	1	2	1	Zwierzęta domowe 1	kot;cat\r\npies;dog\r\nchomik;hamster\r\nżółw;turtle\r\npapuga;parrot	5	\N	\N
3	1	1	2	2	Warzywa 1	ziemniak;potato\r\npomidor;tomato\r\nmarchew;carrot\r\nogórek;cucumber	4	\N	\N
2	1	1	2	1	Zwierzęta domowe 2	ryby;fish\r\nmrówka;ant\r\njaszczurka;lizard	3	\N	\N
4	1	1	2	3	Owoce 1	jabłko;apple\r\ngruszka;pear\r\nśliwka;plum\r\nbanan;banana\r\nkokos;coconut\r\nkiwi;kiwi\r\ncytryna;lemon\r\narbuz;watermelon\r\nwiśnia;cherry\r\npomarańcza;orange\r\nbrzoskwinia;peach	11	\N	\N
\.


--
-- Name: zestaw_id_seq; Type: SEQUENCE SET; Schema: public; Owner: kkulewski
--

SELECT pg_catalog.setval('zestaw_id_seq', 4, true);


--
-- Name: jezyk_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY jezyk
    ADD CONSTRAINT jezyk_pkey PRIMARY KEY (id);


--
-- Name: kategoria_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY kategoria
    ADD CONSTRAINT kategoria_pkey PRIMARY KEY (id);


--
-- Name: konto_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY konto
    ADD CONSTRAINT konto_pkey PRIMARY KEY (id);


--
-- Name: migration_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: podkategoria_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY podkategoria
    ADD CONSTRAINT podkategoria_pkey PRIMARY KEY (id);


--
-- Name: user_email_key; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_email_key UNIQUE (email);


--
-- Name: user_password_reset_token_key; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);


--
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: user_username_key; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_username_key UNIQUE (username);


--
-- Name: wynik_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY wynik
    ADD CONSTRAINT wynik_pkey PRIMARY KEY (id);


--
-- Name: zestaw_pkey; Type: CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw
    ADD CONSTRAINT zestaw_pkey PRIMARY KEY (id);


--
-- Name: podkategoria_kategoria_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY podkategoria
    ADD CONSTRAINT podkategoria_kategoria_id_fkey FOREIGN KEY (kategoria_id) REFERENCES kategoria(id);


--
-- Name: wynik_konto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY wynik
    ADD CONSTRAINT wynik_konto_id_fkey FOREIGN KEY (konto_id) REFERENCES konto(id);


--
-- Name: wynik_zestaw_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY wynik
    ADD CONSTRAINT wynik_zestaw_id_fkey FOREIGN KEY (zestaw_id) REFERENCES zestaw(id);


--
-- Name: zestaw_jezyk1_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw
    ADD CONSTRAINT zestaw_jezyk1_id_fkey FOREIGN KEY (jezyk1_id) REFERENCES jezyk(id);


--
-- Name: zestaw_jezyk2_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw
    ADD CONSTRAINT zestaw_jezyk2_id_fkey FOREIGN KEY (jezyk2_id) REFERENCES jezyk(id);


--
-- Name: zestaw_konto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw
    ADD CONSTRAINT zestaw_konto_id_fkey FOREIGN KEY (konto_id) REFERENCES konto(id);


--
-- Name: zestaw_podkategoria_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: kkulewski
--

ALTER TABLE ONLY zestaw
    ADD CONSTRAINT zestaw_podkategoria_id_fkey FOREIGN KEY (podkategoria_id) REFERENCES podkategoria(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

