DROP TABLE CRITIQUE CASCADE CONSTRAINTS;
DROP TABLE USERS;

CREATE TABLE USERS(
  USERNAME varchar2(25),
  PASSWORD varchar2(75),
  VISIBILITE number(2),
  CONSTRAINT username_pk PRIMARY KEY (username));

CREATE TABLE CRITIQUE(
	CRITIQUEID NUMBER(7) 
	GENERATED BY DEFAULT ON NULL AS IDENTITY, 
  TITRE varchar2(25),
	COMMENTAIRE varchar2(75),
	USERNAME varchar2(25),
	DATE_ENVOI date,
  FICHIER VARCHAR(225),
	CONSTRAINT critiqueid_pk PRIMARY KEY (critiqueid)
        );

CREATE TABLE FAVORI(
	USERNAME varchar2(25),
	CRITIQUEID NUMBER(7)
	);

ALTER TABLE critique 
   ADD CONSTRAINT critique_username_fk
   FOREIGN KEY (username) REFERENCES users (username);
   
 ALTER TABLE favori 
   ADD CONSTRAINT favori_username_fk
   FOREIGN KEY (username) REFERENCES users (username);

ALTER TABLE favori
   ADD CONSTRAINT favori_critiqueid_fk
   FOREIGN KEY (critiqueid) REFERENCES critique (critiqueid);