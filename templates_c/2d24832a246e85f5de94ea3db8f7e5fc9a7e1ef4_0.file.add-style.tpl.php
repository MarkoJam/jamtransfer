<?php
/* Smarty version 3.1.32, created on 2023-03-09 11:35:18
  from 'c:\wamp\www\jamtransfer\templates\add-style.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_6409c476811ce1_64383323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d24832a246e85f5de94ea3db8f7e5fc9a7e1ef4' => 
    array (
      0 => 'c:\\wamp\\www\\jamtransfer\\templates\\add-style.tpl',
      1 => 1678188740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6409c476811ce1_64383323 (Smarty_Internal_Template $_smarty_tpl) {
?><style>


/* DriversTransfers/templates/index.tpl and AgentsTransfers/templates/index.tpl */
.row_e:hover{ background:rgb(229, 229, 240); }
/* Off */ /* .row_e{ padding:0 0 3px 0; font-size:18px; } */
.col-md-4_e{ margin-bottom: 5px; }


/* Booking/templates */
.book{ color:white; }
.book label{ color:white; }
#selectTo_options a{ color:white; }
#selectFrom_options a { color:white; }
.row-add{ padding:20px; }
.fa-user{ color:white; }

/* Route */
#TerminalID{
	height:20px;
	z-index:1;
	width:405px;
}
#TerminalID option:hover{
    background: #0088cc;
    color: white;
}

/* ListTemplate.php */
#show_items .row-edit{
    color:#179ae6;
    /* color:#3C8DBC; older */
    font-weight:bold;
    padding:5px 0;
}

/* Bookings/Orders */
.row-sticky{
    position: sticky;
    top: 0;
    z-index: 5;
    background-color: white;
    margin-left: 0px;
    margin-right: 0px;
    color: #0088cc;
    /* background: #a1bdca; */
}

.row .itemsheader-edit{
    background: #dadbebc0;
    border: 1px solid #c5c5c5;
    position: sticky;
    top: 20;
    z-index: 5;
    margin-left: 0px;
    margin-right: 0px;
    padding: 5px;
    box-shadow: 5px 5px 8px #616060;
}
.row .itemsheader-edit .col-md-2{
    border-right: 1px solid #c5c5c5;
}

.row .listTile-edit{
    display: flex;
    margin-left: 0px;
    margin-right: 0px;
    background:#d9d8d8;
}
.listTile-edit .col-md-2{
    background: #86bbd6;
    margin: 5px;
    border-radius: 5px;
    box-sizing: border-box;
    box-shadow: 5px 5px 8px #616060;
}
.listTile-edit .col-md-2:hover{
    background: #9fc7db;
}

.box-header-edit{
    background: #3f67b9;
    color: white;
}
.box-body-edit{ background: #3f67b9; }

.select-top-edit{
    color:rgb(78 66 66);
    padding:2px;
    border-radius: 5px !important;
    margin-bottom: 2px;
    box-shadow: 2px 2px 4px #616060 inset;
}
.select-bottom-edit{
    color:rgb(78 66 66);
    padding:2px;
    border-radius: 5px !important;
    margin-top: 2px;
    box-shadow: 2px 2px 4px #616060 inset;
}

.button-asc-edit, .button-desc-edit{
    box-shadow: 2px 2px 4px #616060;
    background: #7ec2e9;
    border: 1px solid rgb(152, 152, 155);
}

.input-one{ border-radius: 5px !important; }

.select-top-edit, .select-bottom-edit, .button-asc-edit, .button-desc-edit, .input-one{
    outline:none;
    border:2px solid rgb(192, 199, 241);
    font-family: 'Times New Roman', Times, serif;
    color:rgb(59, 59, 66) !important;
}
.select-top-edit:focus, .select-bottom-edit:focus, .button-asc-edit:focus, .button-desc-edit:focus, .input-one:focus{
    outline:none;
    border:2px solid rgb(135, 147, 218);
}

.badge-edit{
    color: #054ff3;
    background: #f9f9f9;
}

.btn-default-edit{
    color:white !important;
}
.btn-default-edit:hover{
    color:black !important;
}
/* End of Bookings/Orders */


.box-body .row-edit-2{
	margin-top:5px;
}





.wrapper-edit{ padding:0px; }
.white-bg-edit{ padding-bottom:30px;}

.additional-class{
    position: fixed;
    height: 100vh;
    overflow-y: auto;
}

.nav-header-edit{
    background-image: linear-gradient(#c9a859, #786d4f);
    /* background-color: #dbd6ca; */
    /* background-color: #e4e4e4; older */
    margin: 0 5px 5px 5px;
    padding: 5px;
    box-sizing: border-box;
    /* border: 2px solid #4c81ad; */
    box-shadow: 5px 5px 8px #888888;
    border-radius: 10px;
    z-index:1;
}
.nav-header-edit #a-setout{
    text-decoration: underline;
    color: rgb(54 54 54);
    padding: 5px 0 5px 2px;
    display: block;
}
.nav-header-edit #a-setout:hover{
    color: rgb(233 183 136);
    /* color: rgb(184, 126, 71); old */
    background: none;
}

.navbar-header .btn-primary-edit{
    background-color: #3c72bc;
    border-color: #3c72bc;
    margin-left:15px;
    box-shadow: 2px 2px 5px #424181;
}
.navbar-header .btn-primary-edit:hover{
    background-color: #36619f;
    border-color: #3c72bc;
}

.cut-name{
    color:rgb(30 104 166);
    font-family: 'Times New Roman', Times, serif;
    text-shadow: 1px 1px #3e3e42;
    /* font-style: italic; */
}
.mini-navbar .nav-header-edit .cut-name{
    overflow:hidden; 
    white-space:nowrap; 
    text-overflow:ellipsis; 
    width:60px; 
}

.mini-navbar .nav-header-edit .cut-name-2{
    overflow:hidden; 
    white-space:nowrap; 
    text-overflow:ellipsis; 
    width:50px; 
}

.nav-header-top-edit{
    background-image: linear-gradient(#8b4444, #212628) !important;
    /* background: #175a89; */
    /* background: #476092; older */
    margin: 5px 5px 10px 5px;
    border-radius: 10px;
    /* box-shadow: 5px 5px 16px #424181 inset; */
}

.navbar-static-side{ box-shadow: 5px 5px 8px #888888; }

.small-box, .small-box-footer{
    border-radius: 10px;
    box-shadow: 5px 5px 8px #616060;
}

.box-info, .box-primary{ box-shadow: 5px 5px 8px #616060; }

.nav-header-edit #set-as{ color: #3e3e3e;}
.nav-header-edit #set-as, #set-as-2{ font-family:Georgia, 'Times New Roman', Times, serif; }


/* pageListHeader.tpl -------------------------------------------------------- */

.form-group.group-edit{
    display: inline-block;
    width:70%;
}
@media screen and (max-width:1000px){
    .form-group.group-edit{
        width:90%;
    }
    
}

.itemsheader-edit{
    background: #def6fe;
    padding-top: 10px;
}

.col-md-2-infoShow{
    font-weight: 900;
}

.btn-xs-edit{
    margin-left: 20px;
    margin-bottom: 10px;
}
/* ------------------------------------------------------------------------------- */

/* NAVBAR: */

/* Navbar Side */
.navbar-default-edit{
    /* background-image: linear-gradient(#050505, #42536B); */
    background-image: linear-gradient(#050505, #282222);
    /* background-image: linear-gradient(#333a42, #3e576e); older */
}

/* navbar top fixed */
.navbar-static-top-edit{
    background-image: linear-gradient(to bottom right, #76889f, #cceeff);
    /* background-image: linear-gradient(to bottom right, silver, #cceeff); older */
}

.nav-label-edit{
    font-style: italic;
    text-shadow: 2px 2px 1px #494949;

}

#side-menu .edit-fa{
    text-shadow: 3px 3px 2px #494949;
}


.nav.nav-second-level > li.active a{
    background-image: linear-gradient(#705d5d, #1c1919) !important;
    /* background-image: linear-gradient(#794e4e, #1c1919) !important; */
}
/* ------------------------------------------------------------------------------- */

/* Footer */
.footer-edit{
    background-image: linear-gradient(to bottom right, silver, #cceeff);
}
.pull-left-edit{ margin-left:10px; }
.pull-right-edit{ margin-right:20px; }


/* Button */
.button-3 {
  appearance: none;
  /* background-color: #2ea44f; old */
  background-color: #2e8ba4;
  /* background: linear-gradient(177deg, #2ea44f 0%, #58ce79 100%); */
  border: 1px solid rgba(27, 31, 35, .15);
  border-radius: 6px;
  /* box-shadow: rgba(27, 31, 35, .1) 0 1px 0; Old */ 
  box-shadow: 2px 2px 5px #424181;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,system-ui,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji";
  font-size: 14px;
  font-weight: 600;
  /* line-height: 20px; */
  padding: 6px 16px;
  margin-top: -5px;
  margin-right:5px;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
}

.button-3:hover {
  /* background-color: #2c974b; old */
  background-color: #45afcc;
  
}

/* ------------------------------------------ */
/* Dialog */
.ui-dialog{
    height: 50% !important;
    overflow-y: auto;
}

.textarea-dalog{
    width: 100% !important;
    height:70% !important;
	resize: none;
    box-sizing: border-box !important;
}
/* ------------------------------------------ */

/* EditForm: */
.box-body .row{
	margin-bottom: 10px;
}

/* ------------------------------------------ */


/* Cursor pointer */
.listTile{ cursor:pointer;}
.listTile:hover{ background: rgb(229 229 231); }
.listTitleEdit{ cursor:auto !important; }
.listTitleEdit:nth-of-type(2n){ background: #f1f1f1 !important; }
.listTitleEdit:nth-of-type(2n):hover{ background: rgb(229 229 231) !important; }
/* off */
/* .listTile:focus{ background: rgb(71, 42, 173); } */









</style><?php }
}
