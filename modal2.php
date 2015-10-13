<div class="modal fade" id="modalres" ng-controller='geral'>
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
                        <div class="tab-pane active" id="tab11">
                            <div class="row" style="margin-top: 20px">

                                <div class="col-sm-12" >
                                <form class="form2" action="gravarDados.php" method="post" accept-charset="utf-8">

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="nome" value="" placeholder="Nome:">
                                    </div>
                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="rg" value="" placeholder="RG:">
                                        <input type="hidden" name="type" value="pf">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control cpf" name="cpf" value="" placeholder="CPF:">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control emails" name="email" value="" placeholder="E-mail:">
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- //fim row  -->
                        </div>


                        <div class="tab-pane" id="tab21">
                            <div class="row" style="margin-top: 20px">

                                <div class="col-sm-12" >  

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control" name="endereco" value="" placeholder="Endereço:">    

                                    </div>

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control numero" name="numero" value="" placeholder="Número:">    

                                    </div>                  

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control phone_with_ddd" name="celular" value="" placeholder="Telefone Celular:">

                                    </div>

                                    <div class="form-group col-md-6">

                                        <input type="text" class="form-control phone_with_ddd" name="telefone" value="" placeholder="Telefone Fixo:">

                                    </div>

                                    <?php
                                   
                                        include 'global.php';

                                    ?>
                                    <label style="margin-left: 30px" for="cod_estados">Estado:</label>
                                    <select name="cod_estados" id="cod_estados1">
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
                                    <select name="cod_cidades" id="cod_cidades1">
                                        <option value="">-- Escolha um estado --</option>
                                    </select>

                                    <br><br>

                                    <a href="2015-09-24 (1).pdf"><i class="fa fa-file"></i> CONTRATO DE PRESTAÇÃO DE SERVIÇOS</a>

                                    <br><br>

                                    <input type="checkbox" name="termos" ng-model="checkae" value=""> Li e concordo com os Termos e Condições do <a href="2015-09-24 (1).pdf">Contrato de Serviços</a>  
                                   

                                </div>
                                
                            </div>   
                            <!-- //fim row  -->    
                        </div>
                    </div>            
                            
                </div><!-- fim do modal body -->


                <div class="modal-footer">

                    <div style="float:right">
                        <input type='submit' ng-hide="!checkae" class='btn btn-primary enviar hidden' name='enviar' value='Enviar' />
                    </div>

                    </form>

                    <div style="float:right">
                        <input type='button' href="#tab21" data-toggle="tab" class='btn btn-primary next' name='next' value='Próximo' />
                    </div>

                    <div style="float:left">
                        <input type='button' href="#tab11" data-toggle="tab" class='btn btn-primary previous' name='previous' value='Voltar' />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






