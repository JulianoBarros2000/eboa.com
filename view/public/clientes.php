<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
       <!-- PRINCIPAL LISTA FUNCIONÁRIO-->
        <main class="principal-funcionario">
            <div class="titulo">
                <span class="sumario">Todos Clientes</span>
                <div><span>Home > Clientes</span></div>
            </div>
    
            <div class="tabela-funcionario">
                <div class="cab-tabela">
                    <span id="render">Cliente</span>
                    <div><a href="#" class="imprimir"><i class="icon-download"></i></a> <a href="home.php?opcao=12.1&cd=dc"> + Cadastrar</a>
                    </div>
               
                </div>
                <?php

use App\model\entidades\Admin;

 if(isset($_SESSION['geral_success'])){
            echo "<div class='sucesso'>{$_SESSION['geral_success']}</div>";
         } unset($_SESSION['geral_success']); 
 if(isset($_SESSION['clp'])){
            echo "<div class='sucesso'>{$_SESSION['clp']}</div>";
         } unset($_SESSION['clp']); 
         ?>
                <?php 
                 $page_c = 1;
                 if (isset($_GET['page_c'])) {
                     $page_c = filter_input(INPUT_GET, 'page_c', FILTER_VALIDATE_INT);
                 }
                 if (!$page_c) {
                     $page_c = 1;
                 }
                 $limite_c = 4;
                 $inicio_c = ($page_c * $limite_c) - $limite_c;
     
                 $admin = new Admin;
                 $clientes = $admin->listarCliente("SELECT * FROM cliente_sistema cs join contactos c on cs.id_contacto = c.id_contactos join morada m on cs.id_morada = m.id_morada ORDER BY cs.nome LIMIT $inicio_c,$limite_c");
     
                 $numero_registo_c = $admin->listarCliente("SELECT COUNT(nome) count FROM cliente_sistema")[0]['count'];
     
                 $count_c = ceil($numero_registo_c / $limite_c);
                ?>
                <div class="search-input"><span>Pesquisa:</span><input class="input-search" type="search" placeholder="Pesquise o cliente"></div>
                <div class="tabela-view">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Telemóvel</th>
                                <th>Telefone Alternativo</th>
                                <th>Município</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente) : ?>
                                <?php extract($cliente); ?>
                                <tr>
                                    <td><img src="../assets/img/clientes/<?=$foto_perfil?>" alt=""></td>
                                    <td style="text-align: left;"><?= ucwords($nome) ?></td>
                                    <td><?= $sexo?></td>
                                    <td style="text-align: left;"><?= $email ?></td>
                                    <td><?= $telemovel ?></td>
                                    <td><?= $telefone_alt ?></td>
                                    <td><?= ucwords($municipio) ?></td>
                                    <td><a href="?opcao=4.3&cld=<?= $id_cliente?>"><i class="icon-eye"></i></a><a href="home.php?opcao=12.1&rd=cfc&dal=<?=$id_cliente ?>"><i class="icon-edit2"></i></a><a href="?opcao=4.2&cl=<?= $id_cliente ?>&cln=<?= $nome ?>"><i class="icon-trash-b"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($count_c > 1) : ?>
                        <div id="page_fun">
                            <h4 style="color: var(--cor-texto)">Página</h4>
                            <?php if ($page_c > 1) : ?>
                                <a href="?opcao=12&page_c=1">Primeira</a>
                            <?php endif; ?>

                            <?php if ($page_c > 1) : ?>
                                <a href="?opcao=12&page_c=<?= $page_c - 1 ?>"><i class="icon-backspace-outline"></i></a>
                            <?php endif; ?>

                            <div class="page-n"><?= $page_c ?></div>

                            <?php if ($page_c < $count_c) : ?>
                                <a href="?opcao=12&page_c=<?= $page_c + 1 ?>"><i class="icon-next2"></i></a>
                            <?php endif; ?>
                            <?php if ($page_c < $count_c) : ?>
                                <a href="?opcao=12&page_c=<?= $count_c ?>">Ultima</i></a>
                            <?php endif ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
                
            </div>
        </main>
        <!-- FIM PRINCIPAL LISTA FUNCIONÁRIO=====================-->
        </div>
        <script src="../assets/js/script-funcionarios.js"></script>
        </body>

        </html>