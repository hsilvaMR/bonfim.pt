<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Meta Tags
    |--------------------------------------------------------------------------
    */
    'siteTitulo' => 'Gaivota',
    'siteDescricao' => 'Backoffice desenvolvido pela Mcode (84246 36 22766 337626337 636337).',
    
    'loginTitulo' => 'Login | Gaivota',
    'restoreTitulo' => 'Recuperar | Gaivota',
    'dashboardTitulo' => 'Painel | Gaivota',
    'contactsTitulo' => 'Contactos | Gaivota',
    'apartmentsTitulo' => 'Apartamentos | Gaivota',
    'newsTitulo' => 'Notícias | Gaivota',
    'newslleterTitulo' => 'Newsletter | Gaivota',
    'finishMapTitulo' => 'Mapa de acabamentos | Gaivota',
    'adminsTitulo' => 'Administradores | Gaivota',
    'websiteTitulo' => 'Website | Gaivota',
    'datasheetTitulo' => 'Ficha Técnica | Gaivota',

    /*
    |--------------------------------------------------------------------------
    | Email
    |--------------------------------------------------------------------------
    */
    /* assuntos */
    'subjectWelcome' => 'Bem-vindo ao backoffice',
    'subjectActivate' => 'Por favor active a sua conta',
    'subjectRestore' => 'Por favor recupere a sua password',
    'subjectApprovedCompany' => 'Empresa aprovada',
    'subjectDisapprovedCompany' => 'Empresa reprovada',
    'subjectApprovedAccount' => 'Conta aprovada',
    'subjectDisapprovedAccount' => 'Conta reprovada',
    'noreply' => 'noreply',
    /* novo-utilizador */
    'welcomeTi' => 'Olá',
    'welcomeTx' => 'Foi adicionado como gestor de backoffice da <a href="'.asset('').'" style="text-decoration:none;color:#2fb385;cursor:default;">Gaivota</a>, defina uma password para poder aceder em <a href="'.route('loginPageB').'" style="text-decoration:none;color:#2fb385;cursor:default;">'.route('loginPageB').'</a>.',
    'welcomeBt' => 'Definir password',
    /* validar-conta */
    'activateTx' => 'Obrigado por se registar.<br>Por favor active a sua conta.',
    'activateBt' => 'Activar conta',
    /* recuperar-password */
    'restoreTx' => 'Por favor recupere a sua password.',
    'restoreBt' => 'Recuperar password',
    /* empresa-aprovada */
    'ApprovedCompanyTx' => 'A empresa foi aprovada,<br>agora já pode editar em todos os separadores.',
    'ApprovedCompanyBt' => 'Iniciar sessão',
    /* empresa-reprovada */
    'DisapprovedCompanyTx' => 'A empresa foi reprovada,<br>edite os dados e volte a submeter para aprovação.',
    'DisapprovedCompanyBt' => 'Iniciar sessão',
    /* conta-aprovada */
    'ApprovedAccountTx' => 'A sua conta foi aprovada,<br>agora já pode realizar encomendas.',
    'ApprovedAccountBt' => 'Iniciar sessão',
    /* conta-reprovada */
    'DisapprovedAccountTx' => 'A sua conta foi reprovada,<br>edite os seus dados e submeta para aprovação.',
    'DisapprovedAccountBt' => 'Iniciar sessão',


    /* footer */
    'doesntWorkTx' => 'Se o botão não funcionar, copie e cole o seguinte link no seu browser',
    /*
    |--------------------------------------------------------------------------
    | DatePicker
    |--------------------------------------------------------------------------
    */
    'days' => '["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"]',
    'daysShort' => '["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"]',
    'daysMin' => '["D", "S", "T", "Q", "Q", "S", "S", "D"]',
    'months' => '["JAN", "FEV", "MAR", "ABR", "MAI", "JUN", "JUL", "AGO", "SET", "OUT", "NOV", "DEZ"]',
    'monthsShort' => '["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]',

    /*
    |--------------------------------------------------------------------------
    | Upload Imagem
    |--------------------------------------------------------------------------
    */
    'Unsupportedextension' => 'Extensão não suportada:',
    
    /*
    |--------------------------------------------------------------------------
    | Backoffice
    |--------------------------------------------------------------------------
    */
    /* Login */
    'Welcome' => 'Bem-vindo',
    'Email' => 'Email',
    'email' => 'email',
    'Password' => 'Password',
    'password' => 'password',
    'forgotPassword' => 'Esqueceu-se da password?',
    'logIn' => 'Entrar',
    'NonExistentEmail' => 'O endereço de email que inseriste não corresponde a uma conta.',
    'SuccessfullySubmitted' => 'Submetido com sucesso. Verifique o seu email!',
    'LoginSuccessfully' => 'Login realizado com sucesso.',
    'incorrectPassword' => 'A palavra-passe que inseriu está incorreta.',
    'accountLocked' => 'A sua conta encontra-se bloqueada.',
    'accountStillPeding' => 'A sua conta ainda se encontra pendente. Clique no botão para recuperar password e ativar a sua conta.',

    'restoreAccount' => 'Recupere a sua conta.',
    'youKnow' => 'Sabe a password, inicie sessão.',
    'Restore' => 'Recuperar',
    'resetPassword' => 'Redefina a password.',
    'newPassword' => 'Nova password',
    'Save' => 'Guardar',
    'savedSuccessfully' => 'Guardado com sucesso',
    'deleteSuccessfully' => 'Eliminado com sucesso',
    'invalidRequest' => 'Pedido inválido. Solicite um novo pedido de recuperação de password.',
    'beginSession' => 'Iniciar Sessão',
    'lastAcess' => 'Último acesso',
    'Type' => 'Tipo',
    'Status' => 'Estado',
    'Active' => 'Ativo',
    'selectedFiles' => 'ficheiros selecionados',
    'sendSuccessfully' => 'Enviado com sucesso',
    
    /* menu */
    'Account' => 'Conta',
    'Logout' => 'Sair',
    'Dashboard' => 'Painel',
    'Website' => 'Website',
    'Definitions' => 'Definições',
    'Admins' => 'Administradores',
    'Apartments' => 'Apartamentos',
    'Contacts' => 'Contactos',
    'Newsletter' => 'Newsletter',
    'News' => 'Notícias',
    'finishMap' => 'Mapa de acabamentos',
    'editMap' => 'Editar mapa de acabamentos',
   

    /* configuracoes */
    'AddSettings'=>'Adicionar Configuração',
    'AllSettings'=>'Todas as Configurações',
    'NewSetting'=>'Nova Configuração',
    'EditSetting'=>'Editar Configuração',
    'set_days'=>'dias',

    
    /* conta */
    'Name' => 'Nome',
    'Language' => 'Idioma',    
    'SavingR' => 'A guardar...',
    'oldPassword' => 'Antiga password',
    'least6characteres' => 'A nova password tem de ter no mínimo 6 caracteres.',

    'Delete' => 'Apagar',
    'DeleteAvatar' => '<p>Tem a certeza que deseja apagar o <b>Avatar</b>?</p>',
    'DeleteLogotipo' => '<p>Tem a certeza que deseja apagar o <b>Logotipo</b>?</p>',
    'DeleteLine' => '<p>Tem a certeza que deseja apagar esta linha?</p>',
    'Cancel' => 'Cancelar',
    'sendLine' => '<p>Esta newsletter será enviada para todos os seus subscritores</p>',
    'sendNewsletter' => 'Enviar Newsletter',
    'Send' => 'Enviar',

    'Saved' => 'Guardado',
    'Back' => 'Voltar',
    'Ok' => 'Ok',
    'Edit' => 'Editar',
    'Online' => 'Online',
    'Option' => 'Opção',
    'addNew' => 'Adicionar Novo',
    'Description' => 'Descrição',
    'Date' => 'Data',
    'Details' => 'Detalhes',
    'noRecords' => 'Sem dados',



    /* painel */
    'goToPage' => 'Ir para a página',
    'latestAdmins' => 'Últimos administradores',
    'latestCommissions' => 'Últimas comissões',
    'latestAgents' => 'Últimos agentes',
    'latestCustomers' => 'Últimos clientes',
    'latestPayments' => 'Últimos pagamentos',
    'OrdersInProcessing' => 'Encomendas em processamento',
    'latestCompanies' => 'Últimas empresas',
    'latestSellers' => 'Últimos comerciantes',
    'latestContacts' => 'Últimos contactos',
    'latestInformation' => 'Últimas informações técnicas',
    'latestPastime' => 'Últimos passatempos',


    /* contactos */
    'allContacts' => 'Todos os contactos',
    'Message' => 'Mensagem',
    'Contact_Details' => 'Detalhes do contacto',
    'Contact' => 'Contacto',

    /*
    |--------------------------------------------------------------------------
    | Administradores
    |--------------------------------------------------------------------------
    */
    'Administrator' => 'Administrador',
    'adminEdit' => 'Editar Administrador',
    'adminNew' => 'Novo Administrador',
    'Blocked' => 'Bloqueado',
    'Pending' => 'Pendente',
    'invalidEmail' => 'Email inválido!',
    'emailAlready' => 'Este email já tem conta associada!',
    'DeleteUser' => '<p>Tem a certeza que deseja apagar este <b>utilizador</b>?</p>',


    /*
    |--------------------------------------------------------------------------
    | Apartamentos
    |--------------------------------------------------------------------------
    */

    'Fraction' => 'Fração',
    'Useful_area' => 'Área útil',
    'Balconies' => 'Varandas',
    'Gross_area' => 'Área bruta',
    'Floor' => 'Piso',
    'Value' => 'Valor',
    'New_Apartment' => 'Novo Apartamento',
    'Edit_Apartment' => 'Editar Apartamento',
    'Plant_Image' => 'Imagem da planta',
    'Plant_Image_home_slide' => 'Imagem da planta para o slide na  <a style="text-decoration:underline;" href="https://www.gaivota.pt/bonfim-informacao">página</a>, na secção APARTAMENTOS.',
    'DeleteImg_tit' => 'Apagar Imagem',
    'DeleteImg_txt' => 'Tem a certeza que deseja apagar esta imagem?',
    'Division' => 'Divisão',
    'Closets' => 'Roupeiros',
    'Storage' => 'Arrumos',
    'Availability' => 'Disponibilidade',


    /*
    |--------------------------------------------------------------------------
    | Noticias
    |--------------------------------------------------------------------------
    */

    'Title' => 'Título',
    'News_date' => 'Data da notícia',
    'Insert_date' => 'Data de inserção',
    'New_news' => 'Nova Notícia',
    'Edit_news' => 'Editar Notícia',
    'First_text' => 'Primeiro texto',
    'Second_text' => 'Segundo texto',
    'Image' => 'Imagem',

    /*
    |--------------------------------------------------------------------------
    | Ficha técnica
    |--------------------------------------------------------------------------
    */

    'Datasheet' => 'Ficha técnica',
    'Project' => 'Projeto',
    /*
    |--------------------------------------------------------------------------
    | Informação
    |--------------------------------------------------------------------------
    */
    'dashboardTt' => 'Painel',
    'dashboardTx' => 'Aqui são apresentadas as últimas actualizações.',
    'apartmentsTx' => 'Aqui são apresentados os apartamentos inseridos.',
    'newsTx' => 'Aqui são apresentados as notícias inseridas.<br> A ordem das imagens de rasgão é C|B|A.',
    'newsletterTx' => 'Aqui são apresentados as inscrições para as newsletter.',
    'contactsTx' => 'Nesta página pode ver os detalhes ou remover contactos dos clientes que entraram em contacto.',
    'mapTx' => 'Nesta página pode criar, editar ou remover mapa de acabamentos do respetivo prédio.',
    'projetoTx' => 'Nesta página são apresentadas as imagens do projeto, que são apresentadas no slide Projeto, no website.',
    'timelineTx' => 'Nesta página é apresentada a barra de progressão, aqui pode adicionar, editar ou eliminar fases.',




];