# Pratica-Profissional-em-Sistemas
PRAT PROF EM ANAL DES DE SISTEMAS 05J (FCI)

# Requisitos Funcionais

- RF001. O sistema deve apresentar um catálogo de serviços disponíveis
- RF002. O sistema deve cadastrar contratantes
- RF003. O sistema deve cadastrar contratados e seus serviços
- RF004. O sistema deve  processar as etapas de Orçamento e Contratação
- RF005. O sistema deve processar recebimentos
- RF006. O sistema deve remunerar contratados
- RF007. O sistema deve gerar relatórios de acompanhamento dos trabalhos
- RF008. O sistema deve manter pesquisa de satisfação dos contratantes sobre os serviços executados
- RF009. O sistema deve fornecer um contrato para formalização dos serviços
- RF0010. O sistema deve intermediar caso o contratante não concorde com o relatório de execução.
- RF011. O sistema deve informar na dashboard informações dos andamentos dos trabalhos
- RF012. O sistema deve gerar um boleto de acordo com os valores combinados, e para caso de reajuste, com valor reajustado


# Requisitos Não Funcionais

- RNF001. É desejável que o tempo de carga para uma página não seja superior a 5 segundos. 
- RNF002.  Disponibilizar em plataforma web para dispositivos desktop, tablets ou smartphones
- RNF003. A disponibilidade do sistema deverá ser de 99,99% do tempo, em todos segundos possíveis dentro dos sete dias da semanas
- RNF004. Os contratados terão 24h horas para responder no sistema sobre os valores e detalhes
- RNF005. Ao aprovar um orçamento o contratante deverá pagar 20% do valor a título de entrada
- RNF006. Espera-se que o sistema apresente algum uso de dispositivos smart devices de modo a automatizar alguma fase do processo descrito.

# Diagrama de Caso de Uso

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Diagramas/DIAGRAMA_CASOS_DE_USO.jpg)

# Especificação dos Requisitos

## CS001 – Realizar cadastro

|   Identificador   |  CS001  |
|  :---:      |     :---:      |    
| Nome  | Realizar Cadastro     | 
| Atores     | Contratante, Sistema, ADM    | 
| Sumário     | Primeiro passo o cliente realiza o cadastro no sistema, para solicitar serviços desejados.    | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | Usuário acessar o sistema    | 
| Pós-condição     | Cadastro realizado com Sucesso, podendo realizar solicitação do serviço     | 
| Pontos de Inclusão     | N/D    | 
| Pontos de Extensão     | N/D    | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS001.png)
<br>

## CS002 – Realizar Cadastro Com Serviço

|   Identificador   |  CS002  |
|  :---:      |     :---:      |    
| Nome  | Realizar Cadastro Com Serviço     | 
| Atores     | Contratados, ADM e sistema   | 
| Sumário     | Contatado realiza o cadastro dos seus serviços   | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | Acesso liberado só com cadastro   | 
| Pós-condição     | Feito o acesso serviço a ser contratado     | 
| Pontos de Inclusão     | N/D    | 
| Pontos de Extensão     | Cadastro será aprovado pelo ADM    | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS002.png)
<br>

## CS003 – Solicitar Orçamento 

|   Identificador   |  CS003  |
|  :---:      |     :---:      |    
| Nome  | Solicitar Orçamento    | 
| Atores     | Contratante, Contratado e sistema   | 
| Sumário     | Ao realizar o cadastro no sistema o e aprovado pelo ADM e já pode realizar orçamento   | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | Possuir conta cadastrada  | 
| Pós-condição     | N/D   | 
| Pontos de Inclusão     | N/D    | 
| Pontos de Extensão     | N/D   | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS002.png)
<br>

## CS004 – Assinar o contrato e paga a entrada

|   Identificador   |  CS004  |
|  :---:      |     :---:      |    
| Nome  | Assinar o contrato e paga a entrada    | 
| Atores     | Contratante | 
| Sumário     | Assinando o contrato e pagando a entrada do serviço contratado.  | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | Orçamento do serviço solicitado  | 
| Pós-condição     | N/D   | 
| Pontos de Inclusão     | N/D    | 
| Pontos de Extensão     | N/D   | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS002.png)
<br>

## CS005 – realizar serviço contratado na data

|   Identificador   |  CS005  |
|  :---:      |     :---:      |    
| Nome  | realizar serviço contratado na data   | 
| Atores     | Contratante, Sistema | 
| Sumário     |Realizar o serviço contratado na data   | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | N/D    | 
| Pós-condição     | Só na data de contrato    | 
| Pontos de Inclusão     | N/D    | 
| Pontos de Extensão     |Fazer reajuste do valor dos serviços não previsto  | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS002.png)
<br>

## CS006 – Concorda ou recusa a finalização

|   Identificador   |  CS006  |
|  :---:      |     :---:      |    
| Nome  | Concorda ou recusa a finalização   | 
| Atores     | Contratante, Sistema e ADM | 
| Sumário     | O contratante acessa o relatório no sistema    | 
| Complexidade     | Médio    | 
| Regras de Negócio     | N/D    | 
| Pré-condições     | Analisar o serviço   | 
| Pós-condição     | Fechar acordo    | 
| Pontos de Inclusão     | Preenche pesquisa de satisfação  | 
| Pontos de Extensão     | ADM analisa a Justificativa  | 

![](https://github.com/leotseng159/Pratica-Profissional-em-Sistemas/blob/master/Especificação%20dos%20Requisitos/Esp-CS002.png)
<br>








