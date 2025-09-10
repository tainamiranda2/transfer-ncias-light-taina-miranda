Projeto fictício para um teste técnico:

Tema: O Jorge transferências light é uma plataforma de transferências simplificada.
Nela é possível depositar e realizar transferências de dinheiro entre
usuários. Temos 2 tipos de usuários, os comuns e os lojistas, ambos têm
carteira com dinheiro e realizam transferências entre eles.

Tecnologias utilizadas:

laravel 
nodejs
Livewire
mock externo para transferencias https://util.devi.tools/api/v2/authorize
mock externo para envio de notificações https://util.devi.tools/api/v1/notify

Funcionalidades:
Cadastrar transferencias [x]
Bloquear envios de transferencias para usuarios do tipo logistas [x]
Mensagem de sucesso de transferencias [x]
Ver transferencias gerais[x]
Cadastrar usuario com tipos []
Enviar notificações de transferencias [x]


Arquitetura:

rotas: para tranferencia http://127.0.0.1:8000/transferencias
rotas: para ver tranferencia http://127.0.0.1:8000/transferencias/lista
rotas: para tranferencia http://127.0.0.1:8000/transferencias


MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="no-reply@transferencias.com"
MAIL_FROM_NAME="Transferências Light"
