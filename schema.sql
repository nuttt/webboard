--------------------------------------------------------
--  File created - Wednesday-February-19-2014   
--------------------------------------------------------
--------------------------------------------------------
--  DDL for Sequence BAN_LOG_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "WEBBOARD"."BAN_LOG_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence PERSON_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "WEBBOARD"."PERSON_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 21 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence POST_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "WEBBOARD"."POST_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 141 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Sequence TAG_SEQ
--------------------------------------------------------

   CREATE SEQUENCE  "WEBBOARD"."TAG_SEQ"  MINVALUE 1 MAXVALUE 9999999999999999999999999999 INCREMENT BY 1 START WITH 1 CACHE 20 NOORDER  NOCYCLE ;
--------------------------------------------------------
--  DDL for Table BAN_LOG
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."BAN_LOG" 
   (	"START_DATE" DATE, 
	"END_DATE" DATE, 
	"ADMIN_ID" NUMBER(*,0), 
	"PERSON_ID" NUMBER(*,0), 
	"BAN_LOG_ID" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PERSON
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."PERSON" 
   (	"PERSON_ID" NUMBER(*,0), 
	"DISPLAY_NAME" VARCHAR2(20 BYTE), 
	"PASSWORD" VARCHAR2(100 BYTE), 
	"AVATAR" VARCHAR2(50 BYTE), 
	"BIRTHDATE" DATE, 
	"TWITTER" VARCHAR2(50 BYTE), 
	"FACEBOOK" VARCHAR2(50 BYTE), 
	"EMAIL" VARCHAR2(100 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PERSON_ADMIN
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."PERSON_ADMIN" 
   (	"PERSON_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table PERSON_MODERATOR
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."PERSON_MODERATOR" 
   (	"USER_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table POST
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."POST" 
   (	"POST_ID" NUMBER(*,0), 
	"CONTENT" VARCHAR2(4000 BYTE), 
	"TIME" TIMESTAMP (6) DEFAULT NULL, 
	"STATUS" VARCHAR2(10 BYTE), 
	"PERSON_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table POST_REPLY
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."POST_REPLY" 
   (	"POST_ID" NUMBER, 
	"REPLY_TO" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table POST_TOPIC
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."POST_TOPIC" 
   (	"POST_ID" NUMBER, 
	"TITLE" VARCHAR2(200 BYTE), 
	"VISIT" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table REPORT
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."REPORT" 
   (	"PERSON_ID" NUMBER(*,0), 
	"POST_ID" NUMBER(*,0)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table TAG
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."TAG" 
   (	"TAG_ID" NUMBER(*,0), 
	"NAME" VARCHAR2(25 BYTE)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table TOPIC_TAG
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."TOPIC_TAG" 
   (	"TOPIC_ID" NUMBER, 
	"TAG_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Table VOTES
--------------------------------------------------------

  CREATE TABLE "WEBBOARD"."VOTES" 
   (	"PERSON_ID" NUMBER, 
	"STATUS" NUMBER(*,0), 
	"POST_ID" NUMBER
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
REM INSERTING into WEBBOARD.BAN_LOG
SET DEFINE OFF;
REM INSERTING into WEBBOARD.PERSON
SET DEFINE OFF;
Insert into WEBBOARD.PERSON (PERSON_ID,DISPLAY_NAME,PASSWORD,AVATAR,BIRTHDATE,TWITTER,FACEBOOK,EMAIL) values (1,'nuttt','nuttt','nnuttt',to_date('19-FEB-14','DD-MON-RR'),'uuuunut','utnutt','unututnt@gmial.com');
REM INSERTING into WEBBOARD.PERSON_ADMIN
SET DEFINE OFF;
REM INSERTING into WEBBOARD.PERSON_MODERATOR
SET DEFINE OFF;
REM INSERTING into WEBBOARD.POST
SET DEFINE OFF;
REM INSERTING into WEBBOARD.POST_REPLY
SET DEFINE OFF;
REM INSERTING into WEBBOARD.POST_TOPIC
SET DEFINE OFF;
REM INSERTING into WEBBOARD.REPORT
SET DEFINE OFF;
REM INSERTING into WEBBOARD.TAG
SET DEFINE OFF;
REM INSERTING into WEBBOARD.TOPIC_TAG
SET DEFINE OFF;
REM INSERTING into WEBBOARD.VOTES
SET DEFINE OFF;
--------------------------------------------------------
--  DDL for Index MODERATOR_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."MODERATOR_PK" ON "WEBBOARD"."PERSON_MODERATOR" ("USER_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index VOTES_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."VOTES_PK" ON "WEBBOARD"."VOTES" ("PERSON_ID", "POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index TOPIC_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."TOPIC_PK" ON "WEBBOARD"."POST_TOPIC" ("POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index TAG_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."TAG_PK" ON "WEBBOARD"."TAG" ("TAG_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index POST_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."POST_PK" ON "WEBBOARD"."POST" ("POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index ADMIN_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."ADMIN_PK" ON "WEBBOARD"."PERSON_ADMIN" ("PERSON_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index REPORT_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."REPORT_PK" ON "WEBBOARD"."REPORT" ("PERSON_ID", "POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index PERSON_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."PERSON_PK" ON "WEBBOARD"."PERSON" ("PERSON_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index REPLY_PK
--------------------------------------------------------

  CREATE UNIQUE INDEX "WEBBOARD"."REPLY_PK" ON "WEBBOARD"."POST_REPLY" ("POST_ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  Constraints for Table REPORT
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."REPORT" MODIFY ("PERSON_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."REPORT" MODIFY ("POST_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."REPORT" ADD CONSTRAINT "REPORT_PK" PRIMARY KEY ("PERSON_ID", "POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table VOTES
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."VOTES" MODIFY ("PERSON_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."VOTES" MODIFY ("STATUS" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."VOTES" MODIFY ("POST_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."VOTES" ADD CONSTRAINT "VOTES_PK" PRIMARY KEY ("PERSON_ID", "POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table BAN_LOG
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."BAN_LOG" MODIFY ("START_DATE" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."BAN_LOG" MODIFY ("END_DATE" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."BAN_LOG" MODIFY ("ADMIN_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."BAN_LOG" MODIFY ("PERSON_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."BAN_LOG" MODIFY ("BAN_LOG_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table POST_TOPIC
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST_TOPIC" MODIFY ("POST_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST_TOPIC" MODIFY ("TITLE" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST_TOPIC" MODIFY ("VISIT" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST_TOPIC" ADD CONSTRAINT "TOPIC_PK" PRIMARY KEY ("POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table TOPIC_TAG
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."TOPIC_TAG" MODIFY ("TOPIC_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."TOPIC_TAG" MODIFY ("TAG_ID" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table POST_REPLY
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST_REPLY" MODIFY ("POST_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST_REPLY" ADD CONSTRAINT "REPLY_PK" PRIMARY KEY ("POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PERSON_MODERATOR
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."PERSON_MODERATOR" MODIFY ("USER_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON_MODERATOR" ADD CONSTRAINT "MODERATOR_PK" PRIMARY KEY ("USER_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PERSON_ADMIN
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."PERSON_ADMIN" MODIFY ("PERSON_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON_ADMIN" ADD CONSTRAINT "ADMIN_PK" PRIMARY KEY ("PERSON_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table POST
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST" MODIFY ("POST_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST" MODIFY ("CONTENT" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."POST" ADD CONSTRAINT "POST_PK" PRIMARY KEY ("POST_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Constraints for Table PERSON
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."PERSON" MODIFY ("PERSON_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON" MODIFY ("DISPLAY_NAME" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON" ADD CONSTRAINT "PERSON_PK" PRIMARY KEY ("PERSON_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "WEBBOARD"."PERSON" MODIFY ("PASSWORD" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON" MODIFY ("BIRTHDATE" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."PERSON" MODIFY ("EMAIL" NOT NULL ENABLE);
--------------------------------------------------------
--  Constraints for Table TAG
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."TAG" MODIFY ("TAG_ID" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."TAG" MODIFY ("NAME" NOT NULL ENABLE);
  ALTER TABLE "WEBBOARD"."TAG" ADD CONSTRAINT "TAG_PK" PRIMARY KEY ("TAG_ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table BAN_LOG
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."BAN_LOG" ADD CONSTRAINT "BAN_LOG_FK1" FOREIGN KEY ("PERSON_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE CASCADE ENABLE;
  ALTER TABLE "WEBBOARD"."BAN_LOG" ADD CONSTRAINT "BAN_LOG_FK2" FOREIGN KEY ("ADMIN_ID")
	  REFERENCES "WEBBOARD"."PERSON_ADMIN" ("PERSON_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PERSON_ADMIN
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."PERSON_ADMIN" ADD CONSTRAINT "ADMIN_FK1" FOREIGN KEY ("PERSON_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table PERSON_MODERATOR
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."PERSON_MODERATOR" ADD CONSTRAINT "MODERATOR_FK1" FOREIGN KEY ("USER_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table POST
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST" ADD CONSTRAINT "POST_FK1" FOREIGN KEY ("PERSON_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE SET NULL ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table POST_REPLY
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST_REPLY" ADD CONSTRAINT "REPLY_FK1" FOREIGN KEY ("POST_ID")
	  REFERENCES "WEBBOARD"."POST" ("POST_ID") ON DELETE CASCADE ENABLE;
  ALTER TABLE "WEBBOARD"."POST_REPLY" ADD CONSTRAINT "REPLY_FK2" FOREIGN KEY ("REPLY_TO")
	  REFERENCES "WEBBOARD"."POST" ("POST_ID") ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table POST_TOPIC
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."POST_TOPIC" ADD CONSTRAINT "TOPIC_FK1" FOREIGN KEY ("POST_ID")
	  REFERENCES "WEBBOARD"."POST" ("POST_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table REPORT
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."REPORT" ADD CONSTRAINT "REPORT_FK1" FOREIGN KEY ("PERSON_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE CASCADE ENABLE;
  ALTER TABLE "WEBBOARD"."REPORT" ADD CONSTRAINT "REPORT_FK2" FOREIGN KEY ("POST_ID")
	  REFERENCES "WEBBOARD"."POST" ("POST_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table TOPIC_TAG
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."TOPIC_TAG" ADD CONSTRAINT "TOPIC_TAG_FK1" FOREIGN KEY ("TOPIC_ID")
	  REFERENCES "WEBBOARD"."POST_TOPIC" ("POST_ID") ENABLE;
  ALTER TABLE "WEBBOARD"."TOPIC_TAG" ADD CONSTRAINT "TOPIC_TAG_FK2" FOREIGN KEY ("TAG_ID")
	  REFERENCES "WEBBOARD"."TAG" ("TAG_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  Ref Constraints for Table VOTES
--------------------------------------------------------

  ALTER TABLE "WEBBOARD"."VOTES" ADD CONSTRAINT "VOTES_FK1" FOREIGN KEY ("PERSON_ID")
	  REFERENCES "WEBBOARD"."PERSON" ("PERSON_ID") ON DELETE CASCADE ENABLE;
  ALTER TABLE "WEBBOARD"."VOTES" ADD CONSTRAINT "VOTES_FK2" FOREIGN KEY ("POST_ID")
	  REFERENCES "WEBBOARD"."POST" ("POST_ID") ON DELETE CASCADE ENABLE;
--------------------------------------------------------
--  DDL for Trigger BAN_LOG_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "WEBBOARD"."BAN_LOG_TRG" 
BEFORE INSERT ON BAN_LOG 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.BAN_LOG_ID IS NULL THEN
      SELECT BAN_LOG_SEQ.NEXTVAL INTO :NEW.BAN_LOG_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "WEBBOARD"."BAN_LOG_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger PERSON_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "WEBBOARD"."PERSON_TRG" 
BEFORE INSERT ON PERSON 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.PERSON_ID IS NULL THEN
      SELECT PERSON_SEQ.NEXTVAL INTO :NEW.PERSON_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "WEBBOARD"."PERSON_TRG" ENABLE;
--------------------------------------------------------
--  DDL for Trigger POST_TRG1
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "WEBBOARD"."POST_TRG1" 
BEFORE INSERT ON POST 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.POST_ID IS NULL THEN
      SELECT POST_SEQ.NEXTVAL INTO :NEW.POST_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "WEBBOARD"."POST_TRG1" ENABLE;
--------------------------------------------------------
--  DDL for Trigger TAG_TRG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "WEBBOARD"."TAG_TRG" 
BEFORE INSERT ON TAG 
FOR EACH ROW 
BEGIN
  <<COLUMN_SEQUENCES>>
  BEGIN
    IF INSERTING AND :NEW.TAG_ID IS NULL THEN
      SELECT TAG_SEQ.NEXTVAL INTO :NEW.TAG_ID FROM SYS.DUAL;
    END IF;
  END COLUMN_SEQUENCES;
END;
/
ALTER TRIGGER "WEBBOARD"."TAG_TRG" ENABLE;