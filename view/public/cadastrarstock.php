<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
<!-- PRINCIPAL CADASTRAR FUNCIONÁRIO-->
<?php if(isset($_GET['art']) && !empty($_GET['art']) && $_GET['art'] == "art1"):?>
<main class="principal-funcionario">
    
    <div class="titulo">
        
        <span class="sumario">Produtos</span>
        <div><span>Home > Stock > Cadastro de Produtos</span></div>
    </div> 
    <div class="tabela-funcionario">
           
        <div class="cab-tabela">
            <span>Produto</span>
            <span></span>
        </div>
    <?php if (isset($_SESSION['geral_erro'])) {
            echo "<div class='erro'>{$_SESSION['geral_erro']}</div>";
        }  ?>
        <div class="cad-form">
            <!-- verica se exite um parametro eloua -->
            
            <form id="form" action="../../src/controller/process/cadstock.php?search?q=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEgrelatorio+com+dompdo+source+code&oq=relatorio+com+dompdo+source+code&a=1&c_h=Free+Website+Templates&utm_source=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEggoogle&utm_medium=cpc&utm_campaign=11808480144&utm_adgroupID=117740241994&prod=1221&gclid=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEgLwPPD_BwE&l=en&landingSystem=1&aqs=chrome..69i57.90320j0j4&sourceid=chrome&ie=UTF-8" method="POST" enctype="multipart/form-data">
                                    
                <div class="nome input"><label for="nome">Nome</label><input type="text" id="nome" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $nome;
                                                                                                                    } ?>" <?php if (isset($_SESSION['nome_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> name="nome"><span><?php if (isset( $_SESSION['nome_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['nome_erro']}";
                                                                                                                                                                                } ?></span></div>
                <div class="sobrenome input"><label for="fornecedor">Fornecedor</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $fornecedor;
                                                                                                                    } ?>" <?php if (isset($_SESSION['fornecedor_erro']) || isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> id="fornecedor"  name="fornecedor"><span><?php if (isset($_SESSION['fornecedor_erro'])) {
                                                                                                                                                                                                        echo "{$_SESSION['fornecedor_erro']}";
                                                                                                                                                                                                    } ?></span></div>

                
                <div class="municipio input"><label for="municipio">Tipo de Produto</label><input type="text" id="municipio" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                                    extract($_SESSION['campos']);
                                                                                                                                    echo $tp_produto;
                                                                                                                                } ?>" <?php if (isset($_SESSION['tp_produto_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                            echo "class='erro-input'";
                                                                                                                                        } ?>placeholder="Exemplo: alimento, bebida... " name="tp_produto"><span><?php if (isset($_SESSION['tp_produto_erro'])) {
                                                                                                                                                                                                echo "{$_SESSION['tp_produto_erro']}";
                                                                                                                                                                                            } ?></span></div>

                <div class="bairro input"><label for="codigo">Código de Barras</label><input type="text" id="codigo" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $codigo;
                                                                                                                    } ?>" <?php if (isset($_SESSION['codigo_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> name="codigo"><span><?php if (isset($_SESSION['codigo_erro'])) {
                                                                                                                                                                            echo "{$_SESSION['codigo_erro']}";
                                                                                                                                                                        } ?></span></div>
                <div class="n-casa input"><label for="quantidade">Quantidade</label><input min="1" type="number" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                            extract($_SESSION['campos']);
                                                                                                            echo $quantidade;
                                                                                                        } ?>" id="quantidade" <?php if (isset($_SESSION['quantidade_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> name="quantidade"><span><?php if (isset($_SESSION['quantidade_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['quantidade_erro']}";
                                                                                                                                                                                } ?></span></div>
<div class="telefone input"><label for="preco">Preço</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $preco;
                                                                                                            } ?>" <?php if (isset($_SESSION['preco_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> id="preco" name="preco"><span><?php if (isset($_SESSION['preco_erro'])) {
                                                                                                                                                                                        echo "{$_SESSION['preco_erro']}";
                                                                                                                                                                                    } ?></span></div>
               <div class="cargo_f">
                    <input type="text" name="stock" id="cargo" value="<?php if (isset($_SESSION['campos'])) {
                                                                            extract($_SESSION['campos']);
                                                                            echo $stock;
                                                                        }?>">
                    <div class="select">
                        <span type="#" <?php if (isset($_SESSION['stock_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                            echo "class='first erro-input'";
                                        } else {
                                            echo 'class="first"';
                                        } ?>><?php if (isset($_SESSION['campos'])) {
                                                    extract($_SESSION['campos']);
                                                    if (!empty($stock) && isset($stock)) {

                                                        echo $stock;
                                                    } else {
                                                        echo "Escolher Stock";
                                                    }
                                                } else {
                                                    echo "Escolher Stock";
                                                }?></span>
                        <div class="select-item">
                            <span>Stock WebSite</span>
                            <span>Stock Local</span>
                        </div>
                    </div>
                

                </div>
                <div class="salario input"><label for="descricao">Descrição</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $descricao;
                                                                                                            } ?>" <?php if (isset($_SESSION['descricao_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> id="descricao"  name="descricao"><span><?php if (isset($_SESSION['descricao_erro'])) {
                                                                                                                                                                                        echo $_SESSION['descricao_erro'];
                                                                                                                                                                                    } ?></span></div>

                <div class="genero" <?php if (isset($_SESSION['estado_erro']) || isset($_SESSION['erro_em_borda'])) {
                                        echo "class='erro-input'";
                                    } ?>>
                    <span>Estado do produto</span>

                    <div class="masc">
                        <input type="radio" name="estado" id="activo" value="activo" <?php if (isset($_SESSION['campos'])) {
                                                                                                extract($_SESSION['campos']);
                                                                                                if (!empty($estado) && isset($estado)) {
                                                                                                    if ($estado == "activo") {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                }
                                                                                            } ?>>
                        <label for="activo">Activo</label>
                    </div>

                    <div class="femin">
                        <input type="radio" name="estado" id="inactivo" value="inactivo" <?php if (isset($_SESSION['campos'])) {
                                                                                            extract($_SESSION['campos']);
                                                                                            if (!empty($estado) && isset($estado)) {
                                                                                                if ($estado == "inactivo") {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                        } ?>>
                        <label for="inactivo">Inativo</label>
                    </div>
                    <span><?php if (isset($_SESSION['estado_erro'])) {
                                echo $_SESSION['estado_erro'];
                            } ?></span>
                </div>

                <div class="foto input"><label for="foto">Imagem</label><input type="file" id="foto" accept="image/jpg,image/jpeg,image/png" name="foto" id="file-foto" <?php if (isset($_SESSION['foto_erro']) || isset($_SESSION['erro_em_borda'])) {
                                                                                                                                                                                        echo "class='erro-input'";
                                                                                                                                                                                    } ?>><span><?php if (isset($_SESSION['foto_erro'])) {
                                                                                                                                                                                                    echo $_SESSION['foto_erro'];
                                                                                                                                                                                                } ?></span></div>
                <div class="cad-data input"><label for="data">Data de Validade</label><input type="date" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $data;
                                                                                                                    }
                                                                                                                     ?>" id="data" <?php if (isset($_SESSION['data_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                        echo "class='erro-input'";
                                                                                                                                    } ?> name="data"><span><?php if (isset($_SESSION['data_erro'])) {
                                                                                                                                                                                                                echo $_SESSION['data_erro'];
                                                                                                                                                                                                            } ?></span></div>

                <?php if (isset($_SESSION['geral_erro'])) {
                    unset($_SESSION['geral_erro']);
                } ?>
                <?php if (isset($_SESSION['campos'])) {
                    unset($_SESSION['campos']);
                } ?>
                <?php if (isset($_SESSION['nome_erro'])) {
                    unset($_SESSION['nome_erro']);
                } ?>
                <?php if (isset($_SESSION['fornecedor_erro'])) {
                    unset($_SESSION['fornecedor_erro']);
                } ?>
                <?php if (isset($_SESSION['tp_produto_erro'])) {
                    unset($_SESSION['tp_produto_erro']);
                } ?>
                <?php if (isset($_SESSION['codigo_erro'])) {
                    unset($_SESSION['codigo_erro']);
                } ?>
                <?php if (isset($_SESSION['quantidade_erro'])) {
                    unset($_SESSION['quantidade_erro']);
                } ?>
                <?php if (isset($_SESSION['preco_erro'])) {
                    unset($_SESSION['preco_erro']);
                } ?>
                <?php if (isset($_SESSION['stock_erro'])) {
                    unset($_SESSION['stock_erro']);
                } ?>
                <?php if (isset($_SESSION['descricao_erro'])) {
                    unset($_SESSION['descricao_erro']);
                } ?>
                <?php if (isset($_SESSION['estado_erro'])) {
                    unset($_SESSION['estado_erro']);
                } ?>
                <?php if (isset($_SESSION['data_erro'])) {
                    unset($_SESSION['data_erro']);
                } ?>
                <?php if (isset($_SESSION['foto_erro'])) {
                    unset($_SESSION['foto_erro']);
                } ?>
                <?php if (isset($_SESSION['erro_em_borda'])) {
                    unset($_SESSION['erro_em_borda']);
                } ?>


                <div class="cad-btn"><button type="submit">Cadastrar</button><a href="?opcao=5">Cancelar</a></div>

            </form>
        </div>
    </div>
    <script src="../assets/js/script-cadastrarfuncionario.js"></script>
    

 
</main>

<!-- FIM PRINCIPAL LISTA FUNCIONÁRIO=====================-->
<?php endif;?>


<!-- Cadastrar Matéria prima no stock -->

<!-- PRINCIPAL CADASTRAR FUNCIONÁRIO-->
<?php if(isset($_GET['art']) && !empty($_GET['art']) && $_GET['art'] == "art2"):?>
<main class="principal-funcionario">
    
    <div class="titulo">
        
        <span class="sumario">Matéria Prima</span>
        <div><span>Home > Stock > Cadastro de Matéria Prima</span></div>
    </div> 
    <div class="tabela-funcionario">
           
        <div class="cab-tabela">
            <span>Matéria Prima</span>
            <span></span>
        </div>
    <?php if (isset($_SESSION['geral_erro'])) {
            echo "<div class='erro'>{$_SESSION['geral_erro']}</div>";
        }  ?>
        <div class="cad-form">
            <!-- verica se exite um parametro eloua -->
            
            <form id="form" action="../../src/controller/process/cadstock.php?search?q=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEgrelatorio+com+dompdo+source+code&oq=relatorio+com+dompdo+source+code&a=1&c_h=Free+Website+Templates&utm_source=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEggoogle&utm_medium=cpc&utm_campaign=11808480144&utm_adgroupID=117740241994&mat=1221&gclid=EAIaIQobChMIyOyvyq2b_wIVAobVCh2d_Av1EAAYASAAEgLwPPD_BwE&l=en&landingSystem=1&aqs=chrome..69i57.90320j0j4&sourceid=chrome&ie=UTF-8" method="POST" enctype="multipart/form-data">
                                    
                <div class="nome input"><label for="nome">Nome</label><input type="text" id="nome" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $nome;
                                                                                                                    } ?>" <?php if (isset($_SESSION['nome_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> name="nome"><span><?php if (isset( $_SESSION['nome_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['nome_erro']}";
                                                                                                                                                                                } ?></span></div>
                <div class="sobrenome input"><label for="fornecedor">Fornecedor</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $fornecedor;
                                                                                                                    } ?>" <?php if (isset($_SESSION['fornecedor_erro']) || isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> id="fornecedor"  name="fornecedor"><span><?php if (isset($_SESSION['fornecedor_erro'])) {
                                                                                                                                                                                                        echo "{$_SESSION['fornecedor_erro']}";
                                                                                                                                                                                                    } ?></span></div>

                
                <div class="municipio input"><label for="municipio">Tipo de Matéria Prima</label><input type="text" id="municipio" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                                    extract($_SESSION['campos']);
                                                                                                                                    echo $tp_produto;
                                                                                                                                } ?>" <?php if (isset($_SESSION['tp_produto_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                            echo "class='erro-input'";
                                                                                                                                        } ?>placeholder="Exemplo: tipo de Patrimonio " name="tp_produto"><span><?php if (isset($_SESSION['tp_produto_erro'])) {
                                                                                                                                                                                                echo "{$_SESSION['tp_produto_erro']}";
                                                                                                                                                                                            } ?></span></div>

                <div class="bairro input"><label for="codigo">Código de Barras</label><input type="text" id="codigo" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $codigo;
                                                                                                                    } ?>" <?php if (isset($_SESSION['codigo_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> name="codigo"><span><?php if (isset($_SESSION['codigo_erro'])) {
                                                                                                                                                                            echo "{$_SESSION['codigo_erro']}";
                                                                                                                                                                        } ?></span></div>
                <div class="n-casa input"><label for="quantidade">Quantidade</label><input min="1" type="number" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                            extract($_SESSION['campos']);
                                                                                                            echo $quantidade;
                                                                                                        } ?>" id="quantidade" <?php if (isset($_SESSION['quantidade_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> name="quantidade"><span><?php if (isset($_SESSION['quantidade_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['quantidade_erro']}";
                                                                                                                                                                                } ?></span></div>
<div class="telefone input"><label for="preco">Preço</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $preco;
                                                                                                            } ?>" <?php if (isset($_SESSION['preco_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> id="preco" name="preco"><span><?php if (isset($_SESSION['preco_erro'])) {
                                                                                                                                                                                        echo "{$_SESSION['preco_erro']}";
                                                                                                                                                                                    } ?></span></div>
               <div class="cargo_f">
                    <input type="text" name="estado" id="cargo" value="<?php if (isset($_SESSION['campos'])) {
                                                                            extract($_SESSION['campos']);
                                                                            echo $estado;
                                                                        }?>">
                    <div class="select">
                        <span type="#" <?php if (isset($_SESSION['estado_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                            echo "class='first erro-input'";
                                        } else {
                                            echo 'class="first"';
                                        } ?>><?php if (isset($_SESSION['campos'])) {
                                                    extract($_SESSION['campos']);
                                                    if (!empty($estado) && isset($estado)) {

                                                        echo $estado;
                                                    } else {
                                                        echo "Escolher Estado";
                                                    }
                                                } else {
                                                    echo "Escolher Estado";
                                                }?></span>
                        <div class="select-item">
                            <span>Activo</span>
                            <span>Inactivo</span>
                        </div>
                    </div>
                

                </div>
                <div class="salario input"><label for="descricao">Descrição</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $descricao;
                                                                                                            } ?>" <?php if (isset($_SESSION['descricao_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> id="descricao"  name="descricao"><span><?php if (isset($_SESSION['descricao_erro'])) {
                                                                                                                                                                                        echo $_SESSION['descricao_erro'];
                                                                                                                                                                                    } ?></span></div>



                <div class="foto input"><label for="foto">Imagem</label><input type="file" id="foto" accept="image/jpg,image/jpeg,image/png" name="foto" id="file-foto" <?php if (isset($_SESSION['foto_erro']) || isset($_SESSION['erro_em_borda'])) {
                                                                                                                                                                                        echo "class='erro-input'";
                                                                                                                                                                                    } ?>><span><?php if (isset($_SESSION['foto_erro'])) {
                                                                                                                                                                                                    echo $_SESSION['foto_erro'];
                                                                                                                                                                                                } ?></span></div>
                <div class="cad-data input"><label for="data">Data de Validade</label><input type="date" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $data;
                                                                                                                    }
                                                                                                                     ?>" id="data" <?php if (isset($_SESSION['data_erro'])|| isset($_SESSION['erro_em_borda'])) {
                                                                                                                                        echo "class='erro-input'";
                                                                                                                                    } ?> name="data"><span><?php if (isset($_SESSION['data_erro'])) {
                                                                                                                                                                                                                echo $_SESSION['data_erro'];
                                                                                                                                                                                                            } ?></span></div>

                <?php if (isset($_SESSION['geral_erro'])) {
                    unset($_SESSION['geral_erro']);
                } ?>
                <?php if (isset($_SESSION['campos'])) {
                    unset($_SESSION['campos']);
                } ?>
                <?php if (isset($_SESSION['nome_erro'])) {
                    unset($_SESSION['nome_erro']);
                } ?>
                <?php if (isset($_SESSION['fornecedor_erro'])) {
                    unset($_SESSION['fornecedor_erro']);
                } ?>
                <?php if (isset($_SESSION['tp_produto_erro'])) {
                    unset($_SESSION['tp_produto_erro']);
                } ?>
                <?php if (isset($_SESSION['codigo_erro'])) {
                    unset($_SESSION['codigo_erro']);
                } ?>
                <?php if (isset($_SESSION['quantidade_erro'])) {
                    unset($_SESSION['quantidade_erro']);
                } ?>
                <?php if (isset($_SESSION['preco_erro'])) {
                    unset($_SESSION['preco_erro']);
                } ?>
              
                <?php if (isset($_SESSION['descricao_erro'])) {
                    unset($_SESSION['descricao_erro']);
                } ?>
                <?php if (isset($_SESSION['estado_erro'])) {
                    unset($_SESSION['estado_erro']);
                } ?>
                <?php if (isset($_SESSION['data_erro'])) {
                    unset($_SESSION['data_erro']);
                } ?>
                <?php if (isset($_SESSION['foto_erro'])) {
                    unset($_SESSION['foto_erro']);
                } ?>
                <?php if (isset($_SESSION['erro_em_borda'])) {
                    unset($_SESSION['erro_em_borda']);
                } ?>


                <div class="cad-btn"><button type="submit">Cadastrar</button><a href="?opcao=5">Cancelar</a></div>

            </form>
        </div>
    </div>
    <script src="../assets/js/script-cadastrarfuncionario.js"></script>
    

 
</main>

<!-- FIM PRINCIPAL LISTA FUNCIONÁRIO=====================-->
<?php endif;?>


