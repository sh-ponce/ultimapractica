<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DONACIONES</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- import CSS -->
        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
        <!-- import JavaScript -->
        <script src="https://unpkg.com/element-ui/lib/index.js"></script>

        
    </head>
    <body>
            <div id="app">
                    

                    <el-tabs type="card" @tab-click="handleClick">
                        <el-tab-pane label="Operaciones">

                            <el-button @click="visible = true">Nuevo Donador</el-button>
                                <el-dialog :visible.sync="visible" title=Registro>
                                    <span class="demo-input-label">Nombre:</span>
                                    <el-input placeholder="Escribe tu nombre" v-model="donador.nombre"></el-input> <br><br>
                                      <el-button round @click="registrarDonador"  type="success">Registrar</el-button>

                                 </el-dialog>

                            <el-button @click="visible2 = true">Beneficiario</el-button>
                                <el-dialog :visible.sync="visible2" title="Registro">
                                     <span class="demo-input-label">Nombre:</span>
                                     <el-input placeholder="Escribe tu nombre" v-model="input"></el-input> <br><br>
                                      <el-button round @click="visible = true" type="success">Registrar</el-button>

                            
                                 </el-dialog>


                            <el-button @click="visible3 = true">Donar</el-button>
                                <el-dialog :visible.sync="visible3" title="Donar">
                                     <span class="demo-input-label">Donador:</span>
                                     <el-select v-model="value" placeholder="Select">
                                        <el-option
                                        v-for="item in options"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                        </el-option>
                                    </el-select> <br><br>
                                    <span class="demo-input-label">Beneficiario:</span>
                                     <el-select v-model="value" placeholder="Select"> 
                                        <el-option
                                        v-for="item in options"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                        </el-option> 
                                    </el-select> <br>
                                     <span class="demo-input-label">Cantidad:</span>
                                     <el-input placeholder="Escribe el monto" v-model="input" type="number"></el-input> <br><br>

                                      <el-button round @click="registrarDonador" native-type="submit" type="success">Registrar</el-button>
                                     
                                
                                </el-dialog>

                        </el-tab-pane>

                        <el-tab-pane label="Beneficiario">
                            
                        <el-select v-model="value" placeholder="Select"> 
                                        <el-option
                                        v-for="item in options"
                                        :key="item.value"
                                        :label="item.label"
                                        :value="item.value">
                                        </el-option> 
                         </el-select> <br><br>
                              <el-table
                                    :data="tableData"
                                    border
                                    style="width: 100%">
                                    <el-table-column
                                    prop="date"
                                    label="Fecha">
                                    </el-table-column>
                                    <el-table-column
                                    prop="name"
                                    label="Donador">
                                    </el-table-column>
                                    <el-table-column
                                    prop="address"
                                    label="Cantidad">
                                    </el-table-column>
                                </el-table>
                           </el-tab-pane>
                            
                   
            </div>

                        <style>
                                .demo-input-label {
                                    display: inline-block;
                                    font-size: 1.5em;
                                    }
                        </style>



     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                    visible: false,
                    visible2: false,
                    visible3: false,
                    donador:{
                        nombre: null
                    }
                },     
                mounted() {
                   
                },  
                methods: {
                    registrarDonador()
                    {
                        $.post('registrarDonador',
                        {
                            'donador' : this.donador
                        }).done(res=>{
                            console.log('La rspuesta es: ', res);
                            if(res == 1){
                                
                                this.$message({
                                message: 'Donador registrado con exito',
                                type: 'success'
                                });
                        
                            } else{
                                this.$message.error('No se puede regostrar');

                            }
                            
                        });
                    }
                },  
        });
            

     </script>
        
    </body>
</html>
