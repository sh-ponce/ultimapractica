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
                    

                    <el-tabs type="card">
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
                                     <el-input placeholder="Escribe tu nombre" v-model="beneficiario.nombre"></el-input> <br><br>
                                      <el-button round @click="registrarBeneficiario" type="success">Registrar</el-button>

                            
                                 </el-dialog>


                            <el-button @click="visible3 = true">Donar</el-button>
                                <el-dialog :visible.sync="visible3" title="Donar">

                                     <span class="demo-input-label">Donador:</span>
                                     <el-select v-model="donacion.donador" placeholder="Select">
                                        <el-option
                                        v-for="item in donadores"
                                        :key="item.id"
                                        :label="item.nombre"
                                        :value="item.id">
                                        </el-option>
                                    </el-select> <br><br>

                                    <span class="demo-input-label">Beneficiario:</span>
                                     <el-select v-model="donacion.beneficiario" placeholder="Select"> 
                                        <el-option
                                        v-for="item in beneficiarios"
                                        :key="item.id"
                                        :label="item.nombre"
                                        :value="item.id">
                                        </el-option> 
                                    </el-select> <br>

                                     <span class="demo-input-label">Cantidad:</span>
                                     <el-input placeholder="Escribe el monto" v-model="donacion.cantidad" type="number"></el-input> <br><br>

                                      <el-button round @click="donacionfinal" native-type="submit" type="success">Registrar</el-button>
                                     
                                
                                </el-dialog>

                        </el-tab-pane>

                        {{------Empieza la segunda pestaña-----}}

                        <el-tab-pane label="Beneficiario">
                            
                        <el-select v-model="beneficiarioSeleccionado" placeholder="Beneficiario" @change="obtenerDonaciones"> 
                                        <el-option
                                        v-for="item in beneficiarios"
                                        :key="item.id"
                                        :label="item.nombre"
                                        :value="item.id">
                                        </el-option> 
                         </el-select> <br><br>

                               <el-table
                                    :data="donaciones"
                                    border
                                    style="width: 100%">

                                    <el-table-column
                                    prop="donador_id"
                                    label="Donador">
                                    </el-table-column>

                                    <el-table-column
                                    prop="cantidad"
                                    label="Cantidad">
                                    </el-table-column>

                                    <el-table-column
                                    prop="fecha"
                                    label="Fecha">
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
                    },
                    beneficiario:{
                        nombre:null
                    },
                    beneficiarios:[],
                    donadores:[],
                    donacion:{
                        donador: null,
                        beneficiario: null,
                        cantidad: null
                    },
                    cantidad:0,
                    beneficiarioSeleccionado: null,
                    donaciones:[]

                },     
                mounted() {
                   this.obtenerDonadores();
                   this.obtenerBeneficiarios();
                },  
                methods: {
                    obtenerDonaciones()
                    {
                        let id = this.beneficiarioSeleccionado;

                        $.get('consultarDonaciones/' + id).done(res =>{
                            this.donaciones = res;
                        });
                    },
                    registrarDonador()
                    {
                        $.post(
                            'registrarDonador',
                            {
                                'donador' : this.donador
                            }
                        ).done(res=>{
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
                    },
                    registrarBeneficiario()
                    {
                        $.post('registrarBeneficiario',
                        {
                            'beneficiario' : this.beneficiario
                        }).done(res => {
                            console.log('La respuesta es: ', res);
                            if(res == 1){
                                this.$message({
                                    message: 'Beneficiario registrado con exito',
                                    type:'success'
                                });
                            } else{
                                this.$message.error('No se puede registar');
                            }
                        })  
                    },
                    obtenerDonadores()
                    {
                        $.get('obtenerDonadores')
                        .done(res=>{
                            this.donadores = res;
                        });       
                    },
                    obtenerBeneficiarios()
                    {
                        $.get('obtenerBeneficiario')
                        .done(res=>{
                            this.beneficiarios = res;
                        });
                    },
                    donacionfinal(){
                        
                        $.post(
                            'donacionfinal',
                            {
                                'donacion' : this.donacion
                            }
                        )
                        .done(res=>{
                            this.$message({
                                message:"Donación exitosa",
                                type:'success'
                            });

                        })

                    }
                }

            
            });
     </script>
        
    </body>
</html>
