<div class="modal fade" id="modalres">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="rootwizard">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cadastro Residência</h4>
                </div>
                <div class="modal-body">
                  
                    <div id="bar" class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                    </div>
    
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="row" style="margin-top: 20px">

                                <div class="col-sm-12" >


                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="nome" value="" placeholder="Nome:">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="rg" value="" placeholder="RG:">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="cpf" value="" placeholder="CPF:">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="email" value="" placeholder="E-mail:">
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- //fim row  -->
                        </div>


                        <div class="tab-pane" id="tab2">
                            <div class="row" style="margin-top: 20px">

                                <div class="col-sm-12" >  

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="endereco" value="" placeholder="Endereço:">    

                                    </div>

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="numero" value="" placeholder="Número:">    

                                    </div>                  

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="celular" value="" placeholder="Telefone Celular:">

                                    </div>

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="telefone" value="" placeholder="Telefone Fixo:">

                                    </div>

                                    <?php
                                   
                                        $con = new PDO ( "mysql:host=localhost;dbname=serverhouse", "root", "root" );

                                        if (!$con) {
                                            echo "Erro de Conexao";
                                        }

                                    ?>
                                    <label style="margin-left: 30px" for="cod_estados">Estado:</label>
                                    <select name="cod_estados" id="cod_estados">
                                        <option value=""></option>
                                        <?php
                                            $sql = "SELECT cod_estados, sigla
                                                    FROM estados
                                                    ORDER BY sigla";
                                            $stmt = $con->prepare($sql);
                                            $stmt->execute();
                                            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                                $dados[] = $linha;

                                                echo '<option value="'.$linha['cod_estados'].'">'.$linha['sigla'].'</option>';

                                            }
                                           
                                        ?>
                                    </select>

                                    <label style="margin-left: 20px" for="cod_cidades">Cidade:</label>
                                    <!-- <span class="carregando">Aguarde, carregando...</span> -->
                                    <select name="cod_cidades" id="cod_cidades">
                                        <option value="">-- Escolha um estado --</option>
                                    </select>

                                
                                   

                                </div>
                                
                            </div>   
                            <!-- //fim row  -->    
                        </div>
                    </div>            
                            
                </div><!-- fim do modal body -->


                <div class="modal-footer">

                    <div style="float:right">
                        <input type='button' href="#tab2" data-toggle="tab" class='btn btn-primary next' name='next' value='Próximo' />
                    </div>

                    <div style="float:left">
                        <input type='button' href="#tab1" data-toggle="tab" class='btn btn-primary previous' name='previous' value='Voltar' />
                    </div>

                    <div style="float:right">
                        <input type='button' href="#tab2" data-toggle="tab" class='btn btn-primary enviar hidden' name='enviar' value='Enviar' />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>









