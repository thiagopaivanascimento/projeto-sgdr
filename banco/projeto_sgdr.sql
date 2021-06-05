--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.25
-- Dumped by pg_dump version 9.3.25
-- Started on 2021-06-05 14:43:48

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2019 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 24577)
-- Name: alunos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.alunos (
    "ID_Matricula" integer NOT NULL,
    cpf character varying(14) NOT NULL,
    rg character varying(10) NOT NULL,
    org_exp character varying(20) NOT NULL,
    aluno character varying(60) NOT NULL,
    nascimento character varying(10) NOT NULL,
    sexo character varying(10) NOT NULL,
    civil character varying(20) NOT NULL,
    naturalidade character varying(20) NOT NULL,
    nacionalidade character varying(20) NOT NULL,
    endereco character varying(60) NOT NULL,
    bairro character varying(40) NOT NULL,
    cep character varying(10) NOT NULL,
    cidade character varying(20) NOT NULL,
    uf character varying(2) NOT NULL,
    telefone character varying(20) NOT NULL,
    celular character varying(20) NOT NULL,
    email character varying(40) NOT NULL,
    ens_med character varying(40) NOT NULL,
    instituicao character varying(40) NOT NULL,
    curso character varying(40) NOT NULL,
    turno character varying(40) NOT NULL,
    turma character varying(40),
    login character varying(40),
    senha character varying(40),
    nome character varying(40)
);


ALTER TABLE public.alunos OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 24583)
-- Name: alunos_ID_Matricula_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."alunos_ID_Matricula_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."alunos_ID_Matricula_seq" OWNER TO postgres;

--
-- TOC entry 2020 (class 0 OID 0)
-- Dependencies: 172
-- Name: alunos_ID_Matricula_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."alunos_ID_Matricula_seq" OWNED BY public.alunos."ID_Matricula";


--
-- TOC entry 173 (class 1259 OID 24585)
-- Name: cursos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.cursos (
    "ID_curso" integer NOT NULL,
    curso character varying(40) NOT NULL,
    semestre character varying(20) NOT NULL,
    carga_horaria character varying(20) NOT NULL,
    turno character varying(40) NOT NULL
);


ALTER TABLE public.cursos OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 24588)
-- Name: cursos_ID_curso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cursos_ID_curso_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cursos_ID_curso_seq" OWNER TO postgres;

--
-- TOC entry 2021 (class 0 OID 0)
-- Dependencies: 174
-- Name: cursos_ID_curso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cursos_ID_curso_seq" OWNED BY public.cursos."ID_curso";


--
-- TOC entry 175 (class 1259 OID 24590)
-- Name: disciplinas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.disciplinas (
    "ID_disciplina" integer NOT NULL,
    disciplina character varying(60) NOT NULL,
    carga_horaria character varying(10) NOT NULL,
    curso character varying(40)
);


ALTER TABLE public.disciplinas OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 24593)
-- Name: disciplinas_ID_disciplina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."disciplinas_ID_disciplina_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."disciplinas_ID_disciplina_seq" OWNER TO postgres;

--
-- TOC entry 2022 (class 0 OID 0)
-- Dependencies: 176
-- Name: disciplinas_ID_disciplina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."disciplinas_ID_disciplina_seq" OWNED BY public.disciplinas."ID_disciplina";


--
-- TOC entry 177 (class 1259 OID 24595)
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.estados (
    uf character varying(2) NOT NULL,
    estado character varying(20) NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 24658)
-- Name: materiais; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.materiais (
    id integer NOT NULL,
    material character varying(20) NOT NULL,
    disciplina character varying(40),
    curso character varying(40) NOT NULL,
    data character varying(20),
    professor character varying(40) NOT NULL
);


ALTER TABLE public.materiais OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 24656)
-- Name: materiais_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materiais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materiais_id_seq OWNER TO postgres;

--
-- TOC entry 2023 (class 0 OID 0)
-- Dependencies: 184
-- Name: materiais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materiais_id_seq OWNED BY public.materiais.id;


--
-- TOC entry 178 (class 1259 OID 24598)
-- Name: professores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.professores (
    "ID_Professor" integer NOT NULL,
    cpf character varying(14) NOT NULL,
    rg character varying(10) NOT NULL,
    org_exp character varying(40) NOT NULL,
    professor character varying(60) NOT NULL,
    nascimento character varying(40) NOT NULL,
    sexo character varying(40) NOT NULL,
    civil character varying(40) NOT NULL,
    endereco character varying(60) NOT NULL,
    bairro character varying(40) NOT NULL,
    cep character varying(40) NOT NULL,
    cidade character varying(40) NOT NULL,
    uf character varying(20) NOT NULL,
    telefone character varying(40) NOT NULL,
    celular character varying(40) NOT NULL,
    email character varying(40) NOT NULL,
    disciplina character varying(40) NOT NULL,
    curso character varying(40) NOT NULL,
    turno character varying(40) NOT NULL,
    login character varying(40),
    senha character varying(20),
    nome character varying(20)
);


ALTER TABLE public.professores OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 24604)
-- Name: professores_ID_Professor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."professores_ID_Professor_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."professores_ID_Professor_seq" OWNER TO postgres;

--
-- TOC entry 2024 (class 0 OID 0)
-- Dependencies: 179
-- Name: professores_ID_Professor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."professores_ID_Professor_seq" OWNED BY public.professores."ID_Professor";


--
-- TOC entry 182 (class 1259 OID 24641)
-- Name: turmas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.turmas (
    id integer NOT NULL,
    turma character varying(40),
    turno character varying(40),
    vaga character varying(40),
    sala character varying(40),
    curso character varying(40)
);


ALTER TABLE public.turmas OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 24644)
-- Name: turmas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.turmas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.turmas_id_seq OWNER TO postgres;

--
-- TOC entry 2025 (class 0 OID 0)
-- Dependencies: 183
-- Name: turmas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.turmas_id_seq OWNED BY public.turmas.id;


--
-- TOC entry 180 (class 1259 OID 24606)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.usuarios (
    "ID_usuario" integer NOT NULL,
    nome character varying(20) NOT NULL,
    login character varying(10) NOT NULL,
    senha character varying(10) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 24609)
-- Name: usuarios_ID_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."usuarios_ID_usuario_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."usuarios_ID_usuario_seq" OWNER TO postgres;

--
-- TOC entry 2026 (class 0 OID 0)
-- Dependencies: 181
-- Name: usuarios_ID_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."usuarios_ID_usuario_seq" OWNED BY public.usuarios."ID_usuario";


--
-- TOC entry 1866 (class 2604 OID 24611)
-- Name: ID_Matricula; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alunos ALTER COLUMN "ID_Matricula" SET DEFAULT nextval('public."alunos_ID_Matricula_seq"'::regclass);


--
-- TOC entry 1867 (class 2604 OID 24612)
-- Name: ID_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cursos ALTER COLUMN "ID_curso" SET DEFAULT nextval('public."cursos_ID_curso_seq"'::regclass);


--
-- TOC entry 1868 (class 2604 OID 24613)
-- Name: ID_disciplina; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disciplinas ALTER COLUMN "ID_disciplina" SET DEFAULT nextval('public."disciplinas_ID_disciplina_seq"'::regclass);


--
-- TOC entry 1872 (class 2604 OID 24661)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materiais ALTER COLUMN id SET DEFAULT nextval('public.materiais_id_seq'::regclass);


--
-- TOC entry 1869 (class 2604 OID 24614)
-- Name: ID_Professor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.professores ALTER COLUMN "ID_Professor" SET DEFAULT nextval('public."professores_ID_Professor_seq"'::regclass);


--
-- TOC entry 1871 (class 2604 OID 24646)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turmas ALTER COLUMN id SET DEFAULT nextval('public.turmas_id_seq'::regclass);


--
-- TOC entry 1870 (class 2604 OID 24615)
-- Name: ID_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN "ID_usuario" SET DEFAULT nextval('public."usuarios_ID_usuario_seq"'::regclass);


--
-- TOC entry 1996 (class 0 OID 24577)
-- Dependencies: 171
-- Data for Name: alunos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alunos ("ID_Matricula", cpf, rg, org_exp, aluno, nascimento, sexo, civil, naturalidade, nacionalidade, endereco, bairro, cep, cidade, uf, telefone, celular, email, ens_med, instituicao, curso, turno, turma, login, senha, nome) FROM stdin;
5	22233344455	1241241234	Detran	Joao	25/06/2000	M	Solteiro(a)			RUA Q SOBE	Barra	123123123	rio de janeiro	RJ	2121212-1212	212121222122	aluno2@example.com	simonsen	simonsen	TEOLOGIA	Noite - 19:00 às 22:00	turma01	aluno2	aluno2	aluno2
4	12345678901	1341243	Detran	Thiago	10/10/79	M	Casado(a)			RUA Q SOBE1	Bangu	121212121	rio de janeiro	RJ	2121212-1212	21 2212-1212	asf@gmail.com	CTA	Simonen	TEOLOGIA	Manhã - 08:00 às 12:00	turma01	aluno	aluno	aluno01
\.


--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 172
-- Name: alunos_ID_Matricula_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."alunos_ID_Matricula_seq"', 5, true);


--
-- TOC entry 1998 (class 0 OID 24585)
-- Dependencies: 173
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cursos ("ID_curso", curso, semestre, carga_horaria, turno) FROM stdin;
1	TEOLOGIA	4	1440	Manha
6	TEOLOGIA AV	8 Semestres	2880 Horas	Noite - 19:00 às 22:00
7	Magistério em Teologia	8 Semestres	2880 Horas	Manhã e Noite
\.


--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 174
-- Name: cursos_ID_curso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cursos_ID_curso_seq"', 7, true);


--
-- TOC entry 2000 (class 0 OID 24590)
-- Dependencies: 175
-- Data for Name: disciplinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.disciplinas ("ID_disciplina", disciplina, carga_horaria, curso) FROM stdin;
34	religiao basica	40 Hs/a	TEOLOGIA
35	religiao intermediaria	80 Hs/a	TEOLOGIA AV
32	religiao avancada	40 Hs/a	TEOLOGIA
\.


--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 176
-- Name: disciplinas_ID_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."disciplinas_ID_disciplina_seq"', 35, true);


--
-- TOC entry 2002 (class 0 OID 24595)
-- Dependencies: 177
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estados (uf, estado) FROM stdin;
RJ	RIO DE JANEIRO
SP	SAO PAULO
MG	MINAS GERAIS
RS	RIO GRANDE DO SUL
AM	AMAZONAS
ES	ESPÍRITO SANTO
\.


--
-- TOC entry 2010 (class 0 OID 24658)
-- Dependencies: 185
-- Data for Name: materiais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materiais (id, material, disciplina, curso, data, professor) FROM stdin;
1	Biologia	religiao intermediaria	TEOLOGIA AV	10/11/2010	Maria
2	História	religiao intermediaria	TEOLOGIA AV	10/11/2010	Maria
\.


--
-- TOC entry 2030 (class 0 OID 0)
-- Dependencies: 184
-- Name: materiais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materiais_id_seq', 2, true);


--
-- TOC entry 2003 (class 0 OID 24598)
-- Dependencies: 178
-- Data for Name: professores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.professores ("ID_Professor", cpf, rg, org_exp, professor, nascimento, sexo, civil, endereco, bairro, cep, cidade, uf, telefone, celular, email, disciplina, curso, turno, login, senha, nome) FROM stdin;
15	11111111111	1212121212	SSP	José	20/07/2008	1	Casado(a)	RUA Q DESCE	Bangu	121212121	São Paulo	SP	1212121-1224	212323232325	prof2@example.com	religiao avancada	TEOLOGIA AV	Noite - 19:00 às 22:00	admin	admin	José
14	44455566677	1241241234	Detran	Maria	25/06/2000	1	Casado(a)	RUA Q SOBE	Barra	123123123	Minas Gerais	MG	2121212-1212	213232323232	prof@example.com	religiao intermediaria	TEOLOGIA AV	Noite - 19:00 às 22:00	prof	prof	Maria
\.


--
-- TOC entry 2031 (class 0 OID 0)
-- Dependencies: 179
-- Name: professores_ID_Professor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."professores_ID_Professor_seq"', 14, true);


--
-- TOC entry 2007 (class 0 OID 24641)
-- Dependencies: 182
-- Data for Name: turmas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.turmas (id, turma, turno, vaga, sala, curso) FROM stdin;
2	Turma02	Manhã - 08:00 às 12:00	20	Sala T02	TEOLOGIA AV
1	turma01	Noite - 19:00 às 22:00	20	Sala T01	TEOLOGIA
3	Turma 03	Noite - 19:00 às 22:00	10	Sala T03	TEOLOGIA AV
\.


--
-- TOC entry 2032 (class 0 OID 0)
-- Dependencies: 183
-- Name: turmas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.turmas_id_seq', 3, true);


--
-- TOC entry 2005 (class 0 OID 24606)
-- Dependencies: 180
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios ("ID_usuario", nome, login, senha) FROM stdin;
2	Thiago	Paiva	paiva
3	admin	admin2	admin
4	admin	admin3	admin
1	admin	admin	admin
\.


--
-- TOC entry 2033 (class 0 OID 0)
-- Dependencies: 181
-- Name: usuarios_ID_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."usuarios_ID_usuario_seq"', 4, true);


--
-- TOC entry 1874 (class 2606 OID 24617)
-- Name: ID_Matricula; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.alunos
    ADD CONSTRAINT "ID_Matricula" PRIMARY KEY ("ID_Matricula");


--
-- TOC entry 1876 (class 2606 OID 24619)
-- Name: ID_curso; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.cursos
    ADD CONSTRAINT "ID_curso" PRIMARY KEY ("ID_curso");


--
-- TOC entry 1878 (class 2606 OID 24621)
-- Name: ID_disciplina; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.disciplinas
    ADD CONSTRAINT "ID_disciplina" PRIMARY KEY ("ID_disciplina");


--
-- TOC entry 1886 (class 2606 OID 24663)
-- Name: materiais_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.materiais
    ADD CONSTRAINT materiais_pkey PRIMARY KEY (id);


--
-- TOC entry 1882 (class 2606 OID 24623)
-- Name: pk_ID_Professor; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.professores
    ADD CONSTRAINT "pk_ID_Professor" PRIMARY KEY ("ID_Professor");


--
-- TOC entry 1884 (class 2606 OID 24625)
-- Name: pk_ID_usuario; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT "pk_ID_usuario" PRIMARY KEY ("ID_usuario");


--
-- TOC entry 1880 (class 2606 OID 24627)
-- Name: pk_uf; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT pk_uf PRIMARY KEY (uf);


--
-- TOC entry 1887 (class 2606 OID 24628)
-- Name: fk_uf; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alunos
    ADD CONSTRAINT fk_uf FOREIGN KEY (uf) REFERENCES public.estados(uf);


--
-- TOC entry 1888 (class 2606 OID 24651)
-- Name: fk_uf; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.professores
    ADD CONSTRAINT fk_uf FOREIGN KEY (uf) REFERENCES public.estados(uf);


--
-- TOC entry 2018 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2021-06-05 14:43:48

--
-- PostgreSQL database dump complete
--

