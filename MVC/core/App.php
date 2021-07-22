<?php 
    class App{ 
        private $_controller='Login';
        private $_action = "index";
        private $_params = [];
        function __construct(){ 
            $this->handleUrl();
        }
        
        function getUrl(){ 
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            }
            else{
                $url = '/';
            }
            return $url;
        } 
        public function handleUrl(){
            $url = $this->getUrl();
            $urlArr = array_filter(explode( ('/'), $url) ); 
            $urlArr = array_values($urlArr)!=''?array_values($urlArr):'';
             
            if(!empty($urlArr[0])){ 
                if($urlArr[0]=='Admin'){
                    unset($urlArr[0]);
                    $urlArr = array_values($urlArr);
                    if(!empty($urlArr[0])){
                        $this->_controller = ucfirst($urlArr[0]);    
                    }
                    if(file_exists('MVC/controllers/Admin/'.($this->_controller).'.php')){
                        require_once 'MVC/controllers/Admin/'.($this->_controller).'.php'; 
                        //kiểm tra class this->controllers
                        if(class_exists($this->_controller)){
                            $this->_controller = new $this->_controller();
                        }else{
                            //echo "lỗi rồi";
                            $this->loadError();
                        } 
                        unset($urlArr[0]);
                    }
                    else{
                        $this->loadError( );
                    } 
                }
                else{ 
                    if(!empty($urlArr[0])){
                        $this->_controller = ucfirst($urlArr[0]);    
                    }
                    if(file_exists('MVC/controllers/'.($this->_controller).'.php')){
                        require_once 'MVC/controllers/'.($this->_controller).'.php'; 
                        //kiểm tra class this->controllers
                        if(class_exists($this->_controller)){
                            $this->_controller = new $this->_controller();
                        }else{
                            $this->loadError();
                        } 
                        unset($urlArr[0]);
                    }
                    else{
                        $this->loadError( );
                    } 
                } 
                
            }
            else{  
                if(file_exists('MVC/controllers/'.($this->_controller).'.php')){
                    require_once 'MVC/controllers/'.($this->_controller).'.php'; 
                    //kiểm tra class this->controllers
                    if(class_exists($this->_controller)){
                        $this->_controller = new $this->_controller();
                    }else{
                        $this->loadError();
                    } 
                    unset($urlArr[0]);
                }
                else{
                    $this->loadError( );
                } 
            }
            
            
            //xử lý action
            if(!empty($urlArr[1])){
                $this->_action=$urlArr[1];      
                unset($urlArr[1]);          
            }
            
            //xử lý params 
            $this->_params = array_values($urlArr);  
            if(method_exists($this->_controller,$this->_action)){
                call_user_func_array([$this->_controller,$this->_action], $this->_params);
            } 
            else{
                //$this->loadError();
            } 
        }

        public function loadError($name='404'){
            require_once 'MVC/error/'.$name.'.php';
        }
    }
