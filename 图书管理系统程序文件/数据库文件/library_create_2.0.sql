

create table account(
	user_account char(10) not null,
	user_password varchar(10) not null,
	primary key(user_account)
);
create table users(
		user_id char(10) not null,
		user_account char(10) not null,
		user_name varchar(10) not null,
		user_sex char(1) not null,
		user_age int(3) not null,
		user_telephone char(11) not null,
		user_level int(1) not null,
		primary key (user_id),
		foreign key(user_account) references account
);
create table books (
		book_no char(9) not null , 
		book_name varchar(20) not null, 
		book_type varchar(8)not null ,
		author_name varchar(10) not null ,
		publish_house varchar(20) not null, 
		book_price numeric(5,2) not null,
		book_sum int(4) not null, 
		borrow_amount int(4)not null,  
		primary key (book_no),
		foreign key(book_type)references books
);		

create table manager(
		manager_account char(5) not null,
		manager_password varchar(10) not null,
		manager_name varchar(10) not null,
		manager_telephone char(11) not null,
		primary key(manager_account)
);
create table book_borrow(
		user_account char(10) not null,
		book_no char(9) not null,
		borrow_date date not null,
		return_deadline date not null,
		is_return int(2) not null,
		primary key (user_account,book_no,borrow_date),
		foreign key(user_account)references account,
		foreign key(book_no)references books
);
create table book_return(
		user_account char(10) not null,
		book_no char(9) not null,
		return_date date not null,
		primary key (user_account,book_no,return_date),
		foreign key(user_account)references account,
		foreign key(book_no)references books
		
);
create table fine(
		user_account char(10) not null,
		book_no char(9) not null,
		over_days int(3) not null,
		fine_num numeric(5,2) not null,
		is_deal int(1) not null,
		primary key (user_account,book_no),
		foreign key(user_account) references account,
		foreign key(book_no)references books	
);
create table lose(
		book_no char(9)not null,
		user_account char(10)not null,
		price numeric(5,2) not null,
		is_deal int(1)  not null,
		log_date date not null,
		primary key(book_no,user_account,log_date),
		foreign key(book_no)references books,
		foreign key(user_account)references account
);
insert into books values("201800004",'解忧杂货店','小说类','东野圭吾','作家出版社',27.30,10,10);
insert into books values("201800005","月亮与六便士","小说类","毛姆","上海译文出版社",54.60,8,8);
insert into books values("201800006","活着","小说类","余华","译林出版社",36.50,15,15);
insert into books values("201800007","一只独行的猪","文学类","王小波","作家出版社",28.40,6,6);
insert into books values("201800008","皮囊","文学类","蔡崇达","作家出版社",20.10,9,9);
insert into books values("201800009","看见","文学类","柴静","作家出版社",39.70,5,5);
insert into books values("201800010","人性的弱点","科学类","卡耐基","中信出版社",19.5,3,3);
insert into books values("201800011","少有人走的路","科学类","M.斯科特.派克","中信出版社",33.20,4,4);
insert into books values("201800012","刻意练习","科学类","安德斯.艾利克森","科学出版社",60.0,5,5);
insert into books values("201800013","魔鬼经济学","经济类","史蒂芬.列维特","科学出版社",100.00,2,2);
insert into books values("201800014","思考，快与慢","经济类","丹尼尔卡尼曼","科学出版社",82.30,8,8);
insert into books values("201800015","贫穷的本质","经济类","班纳吉","科学出版社",20.30,4,4);
insert into books values("201800016","代码之美","计算机类","Grey Wilson","机械工业出版社",17.3,5,5);
insert into books values("201800017","鸟哥的Linux私房菜","计算机类","鸟哥","机械工业出版社",60.00,1,1);
insert into books values("201800018","时间简史","科学类","史蒂芬.霍金","中信出版社",77.20,7,7);
insert into books values("201800019","果壳中的宇宙","科学类","史蒂芬.霍金","中信出版社",36.30,1,1);
insert into books values("201800020","乌合之众","社会类","古斯塔夫.勒庞","机械工业出版社",29.00,2,2);
insert into books values("201800021","厚黑学","社会类","李宗吾","科学出版社",26.60,2,2);
insert into books values("201800022","大国崛起","文学类","唐晋","中信出版社",18.60,5,5);
insert into books values("201800023","空谷幽兰","文学类","比尔.波特","中信出版社",30.0,2,2);
insert into books values("201800024","五味","文学类","汪曾祺","中信出版社",51.30,2,2);
insert into books values("201800025","鱼羊野史","历史类","高晓松","科学出版社",100.00,1,1);
insert into books values("201800026","资治通鉴","历史类","司马光","科学出版社",400.00,1,1);
insert into books values("201800027","未来简史","历史类","尤瓦尔.赫拉利","科学出版社",300.00,20,20);
insert into books values("201800028","我们仨","文学类","杨绛","商务印书馆",13.50,3,3);
insert into books values("201800029","林徽因传——你是人间四月天","文学类","白落梅","商务印书馆",93.90,20,20);

insert into manager values('root1','root1','管理员1','15229030151');
insert into account values('2018061101','123456');
insert into users values('2016900123','2018061101','用户1','男','22','15229030151','1')