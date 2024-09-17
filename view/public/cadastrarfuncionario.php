<!-- PRINCIPAL CADASTRAR FUNCIONÁRIO-->
<?php if(!isset($_SESSION)){
session_start();
}

if(!isset($_SESSION['user'])){
    header("Location: index.php");
 exit;
}?>
<main class="principal-funcionario">
    <div class="titulo">
        <span class="sumario"><?php

                                use App\model\entidades\Admin;

                                if (isset($_GET['adbrd'])) {
                                    echo "Editar";
                                } else {
                                    echo "Cadastrar";
                                } ?> Funcionário</span>
        <div><span>Home > Funcionários > <?php if (isset($_GET['adbrd'])) {
                                                echo "Edição";
                                            } else {
                                                echo "Cadastro";
                                            } ?></span></div>
    </div>
    <div class="tabela-funcionario">
        <div class="cab-tabela">
            <span> <?php if (isset($_GET['adbrd'])) {
                        echo "Editar";
                    } else {
                        echo "Novo";
                    } ?> Funcionário</span>
            <span></span>
        </div>
        <?php if (isset($_SESSION['geral_erro'])) {
            echo "<div class='erro'>{$_SESSION['geral_erro']}</div>";
        } else if (isset($_SESSION['geral_success'])) {
            echo "<div class='sucesso'>{$_SESSION['geral_success']}</div>";
        }
        unset($_SESSION['geral_success']); ?>
        <div class="cad-form">
            <!-- verica se exite um parametro eloua -->
            <?php if (isset($_GET['eloua'])) {

                $id = filter_var($_GET['eloua'], FILTER_VALIDATE_INT);
                /* consulta da base de dados do usuario */
                $admin = new Admin();
                $_SESSION['id_edit'] = $id;
                $funcionario = $admin->listarFuncionario("SELECT * FROM funcionario f JOIN contactos c ON f.id_contacto = c.id_contactos JOIN morada m ON f.id_morada = m.id_morada WHERE id_funcionario = $id");

                /*  echo "<pre>";
                print_r($funcionario); */
                /* if(isset($funcionario[0][''])){
                    echo $funcionario[0][''];
                } */
            } ?>
            <form id="form" action="<?php if (isset($_GET['adbrd'])) {
                                        echo "../../src/controller/process/editFuncionario.php?eloua=$id";
                                    } else {
                                        echo "../../src/controller/process/cadFuncionario.php";
                                    } ?>" method="POST" enctype="multipart/form-data">
                                    
                <div class="nome input"><label for="nome">Primeiro Nome</label><input type="text" id="nome" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $nome;
                                                                                                                    } ?>" <?php if (isset($_SESSION['nome_erro'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> placeholder="<?php if (isset($funcionario[0]['nome'])) {
                                                                                                                                echo ucwords($funcionario[0]['nome']);
                                                                                                                            }?>" name="nome"><span> <?php if (isset($_SESSION['nome_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['nome_erro']}";
                                                                                                                                                                                } ?></span></div>
                <div class="sobrenome input"><label for="sobrenome">Ultimo Nome</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $sobrenome;
                                                                                                                    } ?>" <?php if (isset($_SESSION['sobrenome_erro'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> id="sobrenome" placeholder="<?php if (isset($funcionario[0]['nome'])) {
                                                                                                                                echo ucwords($funcionario[0]['nome']);
                                                                                                                            }?>" name="sobrenome"><span><?php if (isset($_SESSION['sobrenome_erro'])) {
                                                                                                                                                                                                        echo "{$_SESSION['sobrenome_erro']}";
                                                                                                                                                                                                    } ?></span></div>

                <div class="senha input"><label for="senha">Senha</label><input type="text" id="senha" placeholder="Senha Padrão" disabled></div>
                <div class="rua input"><label for="rua">Rua</label><input type="text" id="rua" placeholder="<?php if (isset($funcionario[0]['rua_casa'])) {
                                                                                                                                echo ucwords($funcionario[0]['rua_casa']);
                                                                                                                            }?>" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                            extract($_SESSION['campos']);
                                                                                                                            echo $rua;
                                                                                                                        } ?>" <?php if (isset($_SESSION['rua_erro'])) {
                                                                                                                                    echo "class='erro-input'";
                                                                                                                                } ?> name="rua"><span><?php if (isset($_SESSION['rua_erro'])) {
                                                                                                                                                            echo "{$_SESSION['rua_erro']}";
                                                                                                                                                        } ?></span></div>

                <div class="municipio input"><label for="municipio">Município</label><input type="text" id="municipio" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                                    extract($_SESSION['campos']);
                                                                                                                                    echo $municipio;
                                                                                                                                } ?>" <?php if (isset($_SESSION['municipio_erro'])) {
                                                                                                                                            echo "class='erro-input'";
                                                                                                                                        } ?>placeholder="<?php if (isset($funcionario[0]['municipio'])) {
                                                                                                                                            echo ucwords($funcionario[0]['municipio']);
                                                                                                                                        }?>" name="municipio"><span><?php if (isset($_SESSION['municipio_erro'])) {
                                                                                                                                                                                                echo "{$_SESSION['municipio_erro']}";
                                                                                                                                                                                            } ?></span></div>

                <div class="bairro input"><label for="bairro">Bairro</label><input type="text" id="bairro" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $bairro;
                                                                                                                    } ?>" placeholder="<?php if (isset($funcionario[0]['bairro'])) {
                                                                                                                        echo ucwords($funcionario[0]['bairro']);
                                                                                                                    }?>" <?php if (isset($_SESSION['bairro_erro'])) {
                                                                                                                                                    echo "class='erro-input'";
                                                                                                                                                } ?>name="bairro"><span><?php if (isset($_SESSION['bairro_erro'])) {
                                                                                                                                                                            echo "{$_SESSION['bairro_erro']}";
                                                                                                                                                                        } ?></span></div>
                <div class="n-casa input"><label for="n-casa">Nº Casa</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                            extract($_SESSION['campos']);
                                                                                                            echo $n_casa;
                                                                                                        } ?>" id="n-casa" <?php if (isset($_SESSION['n_casa_erro'])) {
                                                                                                                                echo "class='erro-input'";
                                                                                                                            } ?> placeholder="<?php if (isset($funcionario[0]['numero_casa'])) {
                                                                                                                                echo ucwords($funcionario[0]['numero_casa']);
                                                                                                                            }?>" name="n_casa"><span><?php if (isset($_SESSION['n_casa_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['n_casa_erro']}";
                                                                                                                                                                                } ?></span></div>

                <div class="bi input"><label for="bi">Nº BI</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                    extract($_SESSION['campos']);
                                                                                                    echo $bi;
                                                                                                } ?>" id="bi" <?php if (isset($_SESSION['bi_erro'])) {
                                                                                                                    echo "class='erro-input'";
                                                                                                                } ?> placeholder="<?php if (isset($funcionario[0]['bi'])) {
                                                                                                                    echo ucwords($funcionario[0]['bi']);
                                                                                                                }?>" name="bi"><span><?php if (isset($_SESSION['bi_erro'])) {
                                                                                                                                                                                    echo "{$_SESSION['bi_erro']}";
                                                                                                                                                                                } ?></span></div>

                <div class="telefone input"><label for="telefone">Telefone</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $telefone;
                                                                                                            } ?>" <?php if (isset($_SESSION['telefone_erro'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?>placeholder="<?php if (isset($funcionario[0]['telemovel'])) {
                                                                                                                        echo ucwords($funcionario[0]['telemovel']);
                                                                                                                    }?>" id="telefone" name="telefone"><span><?php if (isset($_SESSION['telefone_erro'])) {
                                                                                                                                                                                        echo "{$_SESSION['telefone_erro']}";
                                                                                                                                                                                    } ?></span></div>
                <div class="telefone-alternativo input"><label for="telefone-alt">Telefone Alternativo</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                                            extract($_SESSION['campos']);
                                                                                                                                            echo $telefone_alt;
                                                                                                                                        } ?>" <?php if (isset($_SESSION['telefone_alt_erro'])) {
                                                                                                                                                    echo "class='erro-input'";
                                                                                                                                                } ?> id="telefone-alt" placeholder="<?php if (isset($funcionario[0]['telefone_alt'])) {
                                                                                                                                                    echo ucwords($funcionario[0]['telefone_alt']);
                                                                                                                                                }?>" name="telefone_alt"><span><?php if (isset($_SESSION['telefone_alt_erro'])) {
                                                                                                                                                                                                                                        echo "{$_SESSION['telefone_alt_erro']}";
                                                                                                                                                                                                                                    } ?></span></div>

                <div class="email input"><label for="email">Email</label><input type="email" id="email" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                    extract($_SESSION['campos']);
                                                                                                                    echo $email;
                                                                                                                } ?>" <?php if (isset($_SESSION['email_erro'])) {
                                                                                                                            echo "class='erro-input'";
                                                                                                                        } ?> placeholder="<?php if (isset($funcionario[0]['email'])) {
                                                                                                                            echo $funcionario[0]['email'];
                                                                                                                        }?>" name="email"><span><?php if (isset($_SESSION['email_erro'])) {
                                                                                                                                                                        echo "{$_SESSION['email_erro']}";
                                                                                                                                                                    } ?></span></div>

                <div class="cargo_f">
                    <input type="text" name="cargo" id="cargo" value="<?php if (isset($_SESSION['campos'])) {
                                                                            extract($_SESSION['campos']);
                                                                            echo $cargo;
                                                                        }else if (isset($funcionario[0]['cargo'])) {
                                                                            echo ucwords($funcionario[0]['cargo']);
                                                                        }?>">
                    <div class="select">
                        <span type="#" <?php if (isset($_SESSION['cargo_erro'])) {
                                            echo "class='first erro-input'";
                                        } else {
                                            echo 'class="first"';
                                        } ?>><?php if (isset($_SESSION['campos'])) {
                                                    extract($_SESSION['campos']);
                                                    if (!empty($cargo) && isset($cargo)) {

                                                        echo $cargo;
                                                    } else {
                                                        echo "Cargo";
                                                    }
                                                }  else if (isset($funcionario[0]['cargo'])) {
                                                    echo ucwords($funcionario[0]['cargo']);
                                                }else {
                                                    echo "Cargo";
                                                } ?></span>
                        <div class="select-item">
                            <span>Administrador</span>
                            <span>Gerente</span>
                            <span>Operador de caixa</span>
                            <span>Outro</span>
                        </div>
                    </div>

                </div>
                <div class="salario input"><label for="salario">Salário</label><input type="text" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                extract($_SESSION['campos']);
                                                                                                                echo $salario;
                                                                                                            } ?>" <?php if (isset($_SESSION['salario_erro'])) {
                                                                                                                        echo "class='erro-input'";
                                                                                                                    } ?> id="salario" placeholder="<?php if (isset($funcionario[0]['salario'])) {
                                                                                                                        echo number_format($funcionario[0]['salario'],2,',','.');
                                                                                                                    } ?>" name="salario"><span><?php if (isset($_SESSION['salario_erro'])) {
                                                                                                                                                                                        echo $_SESSION['salario_erro'];
                                                                                                                                                                                    } ?></span></div>

                <div class="genero" <?php if (isset($_SESSION['sexo_erro'])) {
                                        echo "class='erro-input'";
                                    } ?>>
                    <span>Sexo</span>

                    <div class="masc">
                        <input type="radio" name="sexo" id="masculino" value="masculino" <?php if (isset($_SESSION['campos'])) {
                                                                                                extract($_SESSION['campos']);
                                                                                                if (!empty($sexo) && isset($sexo)) {
                                                                                                    if ($sexo == "masculino") {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                }
                                                                                            }else if (isset($funcionario[0]['sexo'])) {
                                                                                                if ($funcionario[0]['sexo'] == "masculino") {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            } ?>>
                        <label for="masculino">Masculino</label>
                    </div>

                    <div class="femin">
                        <input type="radio" name="sexo" id="feminino" value="feminino" <?php if (isset($_SESSION['campos'])) {
                                                                                            extract($_SESSION['campos']);
                                                                                            if (!empty($sexo) && isset($sexo)) {
                                                                                                if ($sexo == "feminino") {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                        } else if (isset($funcionario[0]['sexo'])) {
                                                                                            if ($funcionario[0]['sexo'] == "feminino") {
                                                                                                echo "checked";
                                                                                            }
                                                                                        } ?>>
                        <label for="feminino">Feminino</label>
                    </div>
                    <span><?php if (isset($_SESSION['sexo_erro'])) {
                                echo $_SESSION['sexo_erro'];
                            } ?></span>
                </div>

                <div class="foto input"><label for="foto">Foto tipo passe</label><input type="file" id="foto" accept="image/jpg,image/jpeg,image/png" name="foto" id="file-foto" <?php if (isset($_SESSION['foto_erro'])) {
                                                                                                                                                                                        echo "class='erro-input'";
                                                                                                                                                                                    } ?>><span><?php if (isset($_SESSION['foto_erro'])) {
                                                                                                                                                                                                    echo $_SESSION['foto_erro'];
                                                                                                                                                                                                } ?></span></div>
                <div class="cad-data input"><label for="data">Data de Nascimento</label><input type="date" value="<?php if (isset($_SESSION['campos'])) {
                                                                                                                        extract($_SESSION['campos']);
                                                                                                                        echo $data;
                                                                                                                    }else if (isset($funcionario[0]['data_nasc'])) {
                                                                                                                        echo $funcionario[0]['data_nasc'];
                                                                                                                        }
                                                                                                                     ?>" id="data" <?php if (isset($_SESSION['data_erro'])) {
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
                <?php if (isset($_SESSION['sobrenome_erro'])) {
                    unset($_SESSION['sobrenome_erro']);
                } ?>
                <?php if (isset($_SESSION['rua_erro'])) {
                    unset($_SESSION['rua_erro']);
                } ?>
                <?php if (isset($_SESSION['municipio_erro'])) {
                    unset($_SESSION['municipio_erro']);
                } ?>
                <?php if (isset($_SESSION['bairro_erro'])) {
                    unset($_SESSION['bairro_erro']);
                } ?>
                <?php if (isset($_SESSION['n_casa_erro'])) {
                    unset($_SESSION['n_casa_erro']);
                } ?>
                <?php if (isset($_SESSION['bi_erro'])) {
                    unset($_SESSION['bi_erro']);
                } ?>
                <?php if (isset($_SESSION['telefone_erro'])) {
                    unset($_SESSION['telefone_erro']);
                } ?>
                <?php if (isset($_SESSION['telefone_alt_erro'])) {
                    unset($_SESSION['telefone_alt_erro']);
                } ?>
                <?php if (isset($_SESSION['email_erro'])) {
                    unset($_SESSION['email_erro']);
                } ?>
                <?php if (isset($_SESSION['cargo_erro'])) {
                    unset($_SESSION['cargo_erro']);
                } ?>
                <?php if (isset($_SESSION['salario_erro'])) {
                    unset($_SESSION['salario_erro']);
                } ?>
                <?php if (isset($_SESSION['sexo_erro'])) {
                    unset($_SESSION['sexo_erro']);
                } ?>
                <?php if (isset($_SESSION['data_erro'])) {
                    unset($_SESSION['data_erro']);
                } ?>
                <?php if (isset($_SESSION['foto_erro'])) {
                    unset($_SESSION['foto_erro']);
                } ?>


                <div class="cad-btn"><button type="submit"><?php if (isset($_GET['adbrd'])) {
                                                                echo "Editar";
                                                            } else {
                                                                echo "Cadastrar";
                                                            } ?></button><a href="?opcao=4">Cancelar</a></div>

            </form>
        </div>
    </div>
    <script src="../assets/js/script-cadastrarfuncionario.js"></script>
</main>
<!-- FIM PRINCIPAL LISTA FUNCIONÁRIO=====================-->