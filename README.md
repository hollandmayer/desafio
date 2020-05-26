# desafio

Desafio
Construa um CRUD para registro de pedidos. Lembrando que, simulando o mundo real, a soma dos
valores das parcelas deve bater com o valor total do pedido e deve conter apenas 2 casas decimais.
Deverá ser armazenado os dados da localização da pessoa que está cadastrando o pedido utilizando
o serviço ipgeolocation.io .
•
•
•
Dados de entrada:
◦ Valor total do pedido
◦ Número de parcelas
◦ Nome do cliente
◦ CPF do cliente
◦ Forma de pagamento (Cartão, débito, à vista)
◦ Dados da localização do IP de cadastro do pedido (informação automática)
Dados de saída:
◦ Exibição do pedido;
◦ Exibição das parcelas do pedido
Regras específicas das formas de pagamento:
◦ Cartão tem um acréscimo de 3%
◦ Débito tem um desconto de 5%
◦ À vista tem um desconto de 10%
Observação: Não é permitido editar os dados do pedido. Apenas removê-lo.
Requisitos:
• Deverá ser escrito em PHP;
• Não poderá ser utilizado nenhum framework;
• Deverá utilizar git e ser feito em um repositório público (recomendamos github);
• Deverá utilizar o banco de dados MySQL (criar a estrutura para armazenamento).
Pontos extras:
• Correta utilização de orientação a objetos;
• Estrutura dos commits;
• Código limpo e de fácil manutenção;
• SOLID;
• Testes unitários;
• Padrões de projeto utilizados corretamente.
