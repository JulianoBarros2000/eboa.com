<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?> <!-- PRINCIPAL REGISTRO DE VENDA--> 
        <main class="principal-relatorioencomenda principal-minhaconta">
            <div class="titulo">
                <span class="sumario">Preparar Entrega</span>
                <div><span>Home > Encomendas > Preparar entrega</span></div>
            </div>

            <div class="containerencomenda">
                <div class="content">
                    <div class="content1">
                       <table>
                        <thead>
                            <tr>
                                <th>Pruduto</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                            <tr>
                                <td><img src="../assets/img/avatar-08.jpg" style="border-radius: 50%;"></td>
                                <td>Coca Cola</td>
                                <td>200 kz</td>
                                <td>4</td>
                                <td>800 kz</td>
                            </tr>
                        </tbody>
                       </table>
                    </div>
                    <div class="content2">
                        <div class="detalhes-encomenda">
                            <h3>Detalhes da encomenda</h3>
                            <div>
                                <span>Total :&nbsp;&nbsp;&nbsp;</span>
                                <span>   2400 kz</span>
                            </div>
                            <div>
                                <span>Modo de pagamento</span>
                                <span>Numeral</span>
                            </div>
                            <div>
                                <span>Endereço</span>
                                <span>Talatona,camama</span>
                            </div>
                            <div>
                                <span>Telefone</span>
                                <span>938 696 815</span>
                            </div>
                            <div>
                                <span>Email</span>
                                <span>julianosobarros@gmail.com</span>
                            </div>
                        </div>
                        <div><a href="#">Imprimir</a></div>
                    </div>
                </div>
            </div>
        </main>
        <!--FIM PRINCIPAL REGISTRO DE VENDA=====================--> 
    </div>

    <script src="../assets/js/script-registrodevenda.js"></script>
</body>
</html>


