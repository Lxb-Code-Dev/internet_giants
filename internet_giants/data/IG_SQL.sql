/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2021/11/21 21:22:09                          */
/*==============================================================*/


drop table if exists IG_Article_Article;

drop table if exists IG_Article_Category;

drop table if exists IG_Article_Classify;

drop table if exists IG_Article_Comments;

drop table if exists IG_Article_Viparticle;

drop table if exists IG_User_Publishvip;

drop table if exists IG_User_Read;

drop table if exists IG_User_Subscribe;

drop table if exists IG_User_User;

drop table if exists IG_User_Vipuser;

/*==============================================================*/
/* Table: IG_Article_Article                                    */
/*==============================================================*/
create table IG_Article_Article
(
   art_id               char(255) not null,
   us_id                char(255),
   art_view_num         int,
   art_title            char(255),
   art_content          text,
   art_like             int,
   art_com_num          int,
   art_rev_date         date,
   primary key (art_id)
);

/*==============================================================*/
/* Table: IG_Article_Category                                   */
/*==============================================================*/
create table IG_Article_Category
(
   cate_id              char(255) not null,
   cate_name            char(255),
   cate_description     char(255),
   primary key (cate_id)
);

/*==============================================================*/
/* Table: IG_Article_Classify                                   */
/*==============================================================*/
create table IG_Article_Classify
(
   art_id               char(255) not null,
   cate_id              char(255) not null,
   primary key (art_id, cate_id)
);

/*==============================================================*/
/* Table: IG_Article_Comments                                   */
/*==============================================================*/
create table IG_Article_Comments
(
   com_id               char(255) not null,
   art_id               char(255),
   us_id                char(255),
   com_content          text,
   com_username         char(255),
   com_date             date,
   primary key (com_id)
);

/*==============================================================*/
/* Table: IG_Article_Viparticle                                 */
/*==============================================================*/
create table IG_Article_Viparticle
(
   art_id               char(255) not null,
   us_id                char(255),
   art_view_num         int,
   art_title            char(255),
   art_content          text,
   art_like             int,
   art_com_num          int,
   art_rev_date         date,
   vart_contribution    int,
   primary key (art_id)
);

/*==============================================================*/
/* Table: IG_User_Publishvip                                    */
/*==============================================================*/
create table IG_User_Publishvip
(
   us_id                char(255) not null,
   art_id               char(255) not null,
   primary key (us_id, art_id)
);

/*==============================================================*/
/* Table: IG_User_Read                                          */
/*==============================================================*/
create table IG_User_Read
(
   us_id                char(255) not null,
   art_id               char(255) not null,
   primary key (us_id, art_id)
);

/*==============================================================*/
/* Table: IG_User_Subscribe                                     */
/*==============================================================*/
create table IG_User_Subscribe
(
   us_id                char(255) not null,
   IG__us_id            char(255) not null,
   primary key (us_id, IG__us_id)
);

/*==============================================================*/
/* Table: IG_User_User                                          */
/*==============================================================*/
create table IG_User_User
(
   us_id                char(255) not null,
   us_name              char(255),
   us_mail              char(255),
   us_password          char(255),
   us_fan_num           int,
   us_sub_num           int,
   us_contribution      int,
   primary key (us_id)
);

/*==============================================================*/
/* Table: IG_User_Vipuser                                       */
/*==============================================================*/
create table IG_User_Vipuser
(
   us_id                char(255) not null,
   us_name              char(255),
   us_mail              char(255),
   us_password          char(255),
   us_fan_num           int,
   us_sub_num           int,
   us_contribution      int,
   vs_level             int,
   primary key (us_id)
);

alter table IG_Article_Article add constraint FK_IG_Article_Publish foreign key (us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

alter table IG_Article_Classify add constraint FK_IG_Article_Classify foreign key (art_id)
      references IG_Article_Article (art_id) on delete restrict on update restrict;

alter table IG_Article_Classify add constraint FK_IG_Article_Classify2 foreign key (cate_id)
      references IG_Article_Category (cate_id) on delete restrict on update restrict;

alter table IG_Article_Comments add constraint FK_IG_Article_Commentsof foreign key (art_id)
      references IG_Article_Article (art_id) on delete restrict on update restrict;

alter table IG_Article_Comments add constraint FK_IG_User_Comment foreign key (us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

alter table IG_Article_Viparticle add constraint FK_付费文章继承 foreign key (art_id)
      references IG_Article_Article (art_id) on delete restrict on update restrict;

alter table IG_User_Publishvip add constraint FK_IG_User_Publishvip foreign key (us_id)
      references IG_User_Vipuser (us_id) on delete restrict on update restrict;

alter table IG_User_Publishvip add constraint FK_IG_User_Publishvip2 foreign key (art_id)
      references IG_Article_Viparticle (art_id) on delete restrict on update restrict;

alter table IG_User_Read add constraint FK_IG_User_Read foreign key (us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

alter table IG_User_Read add constraint FK_IG_User_Read2 foreign key (art_id)
      references IG_Article_Article (art_id) on delete restrict on update restrict;

alter table IG_User_Subscribe add constraint FK_IG_User_Subscribe foreign key (us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

alter table IG_User_Subscribe add constraint FK_IG_User_Subscribe2 foreign key (IG__us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

alter table IG_User_Vipuser add constraint FK_会员用户继承 foreign key (us_id)
      references IG_User_User (us_id) on delete restrict on update restrict;

