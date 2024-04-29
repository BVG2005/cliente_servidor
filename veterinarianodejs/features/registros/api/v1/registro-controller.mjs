import express from "express";
import RegistroModel from "../../registros-model.mjs";


const { Router } = express;

export default class RegistroController{

    #router = Router();
    #registroModel=null;

    constructor(){
        this.registrar();


    }

    getRouter(){
        return this.#router;
    }

    registrar(){
        const routerV1 = Router();
        routerV1.get(`/registros`, async (req, res) =>  this.getAllregistro(req, res));
        
    
        
        this.#router.use('/v1',routerV1);
    }

    async getAllregistro(req, res) {
        try {
          this.#registroModel = new RegistroModel();
          this.#registroModel.connect();
          const registro = await this.#registroModel.getAllregistro();
          res.json(registro);
        } catch (error) {
          console.error(`error: ${error}`);
        } finally {
          this.#registroModel.closeConnection();
        }
      }
    }


