<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?><!-- PRINCIPAL-->
<main class="principal-minhaconta">
    <div class="titulo">
        <span class="sumario">Perfil</span>
        <div><span>Home > Perfil</span></div>
    </div>
    <div class="perfil-card">
        <div>
            <div class="img">
                <img src="<?php if (isset($_SESSION['foto'])) {
                                    if($_SESSION['foto'] != "none"){
                                          echo "../assets/img/funcionarios/" . $_SESSION['foto'];
                                    }else {
                                        echo "../assets/img/sem-foto.jpeg";
                                    }
                                  
                                } ?>">
            </div>
            <div class="perfil-info">
                <span><?php if (isset($_SESSION['user'])) {    
                                          echo $_SESSION['user'];
                }?></span>
                <span>isildo@gmail.com</span>
                <span>+244 938 993 939</span>
                <span><i class="icon-location"></i> Golf 2, Quintalão</span>
            </div>
        </div>
        <div>
            <a href="#" class="edit-botao">Editar</a>
        </div>
    </div>
    <div class="maisdetalhes">
        <div class="header">
            <span>Mais detalhes</span>
            <a href="#"><i class="icon-edit2"></i></a>
        </div>
        <div class="corpo">
            <div class="dados">
                <span>Nome: <span><?php if (isset($_SESSION['user'])) {    
                                          echo $_SESSION['user'];
                }?></span></span>
                <span>Aniversário: <span>30/03/2002</span></span>
                <span>Sexo: <span>Masculino</span></span>
                <span>Email: <span>isildo@gmail.com</span></span>
                <span>Telefone: <span>+244 938 993 939</span></span>
                <span>Endereço: <span><i class="icon-location"></i> Golf 2, Quintalão</span>
            </div>
            <div class="pmss">
                <span id="titulo">Minhas Permissões</span>
                <table>
                    <thead>
                        <tr>
                            <th>Finanças</th>
                            <th>P. Venda</th>
                            <th>Análises</th>
                            <th>Funcionários</th>
                            <th>Clientes</th>
                            <th>Stock</th>
                            <th>Notificações</th>
                            <th>Config. Site</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="icon-check"></i></td>
                            <td><i class="icon-remove"></i></td>
                            <td><i class="icon-check"></i></td>
                            <td><i class="icon-check"></i></td>
                            <td><i class="icon-remove"></i></td>
                            <td><i class="icon-check"></i></td>
                            <td><i class="icon-remove"></i></td>
                            <td><i class="icon-check"></i></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="edicao-card">
        <div class="header">
            <span>Editar Perfil</span>
            <span><i class="icon-remove remove-botao"></i></span>
        </div>
        <div class="corpo">
            <form action="">
                <div class="input-edit"><label for="">Nome: </label><input type="text"></div>
                <div class="input-edit"><label for="">Sobrenome: </label><input type="text"></div>
                <div class="input-edit"><label for="">Email: </label><input type="email"></div>
                <div class="input-edit"><label for="">Antiga senha: </label><input type="password"></div>
                <div class="input-edit"><label for="">Nova senha: </label><input type="password"></div>
                <div class="input-edit"><label for="">Confirmar senha: </label><input type="password"></div>
                <div class="input-edit"><label for="">Telefone: </label><input type="text"></div>
                <div class="input-edit"><label for="">Telefone Alternativo: </label><input type="text"></div>
                <div class="input-edit"><label for="">Endereço: </label><input type="text"></div>
                <div class="input-edit foto-edit">
                    <label for="">Nova Foto(Opcional): </label>
                    <div class="edit-foto-dgsn">
                        <input type="file">
                        <div class="esclh">
                            <label for="">Escolha foto</label>
                            <span>Procurar</span>
                        </div>

                    </div>
                </div>



                <div class="input-edit-salvar"><input type="submit" value="Salvar reconfigução"></div>
            </form>
        </div>
    </div>


</main>

<!-- FIM PRINCIPAL==================================================-->
</div>
<script src="../assets/js/script-perfil.js"></script>
</body>

</html>