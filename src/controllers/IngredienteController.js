const { Ingrediente } = require("../repository/database/index").models;
const { Op } = require("sequelize");

module.exports = {
    create: async (ingrediente) => {
        const ingredienteDB = await Ingrediente.create({
            nombre: ingrediente.nombre,
            stock: ingrediente.stock,
            precio: ingrediente.precio,
            extra: false,
        });
        return ingredienteDB;
    },
    changeState: async (ingrediente) => {
        const { id, extra } = ingrediente;
        const ingredienteDB = await Ingrediente.findByPk(id);
        if (ingredienteDB) {
            ingredienteDB.extra = extra;
            ingredienteDB.save();
            return ingrediente;
        }
        return false;
    },
    delete: async (id) => {
        const ingrediente = await Ingrediente.findByPk(id);
        if (ingrediente) {
            ingrediente.destroy();
            return ingrediente;
        }
        return false;
    },
    update: async (ingrediente) => {
        const { id, nombre, stock, precio } = ingrediente;
        const ingredienteDB = await Ingrediente.findByPk(id);
        if (ingredienteDB) {
            ingredienteDB.nombre = nombre;
            ingredienteDB.stock = stock;
            ingredienteDB.precio = precio;
            ingredienteDB.save();
            return ingrediente;
        }
        return false;
    },
    getById: async (id) => await Ingrediente.findByPk(id),
    getIngredientes: async () => await Ingrediente.findAll(),
    getIngredientesCheck: async (id_ingredientes) => {
        if (id_ingredientes.length) {
            return await Ingrediente.findAll({
                where: {
                    id: id_ingredientes,
                },
            });
        }
        return await Ingrediente.findAll({
            where: {
                [Op.not]: { id: id_ingredientes },
            },
        });
    },
    getIngredientesNotCheck: async (id_ingredientes) => {
        if (id_ingredientes.length) {
            return await Ingrediente.findAll({
                where: {
                    [Op.not]: { id: id_ingredientes },
                },
            });
        }
        return await Ingrediente.findAll();
    },
};
