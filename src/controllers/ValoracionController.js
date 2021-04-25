const { Valoracion } = require("../repository/database/index").models;

module.exports = {
    getValoracionesByProducto: async (id_producto) => {
        return await Valoracion.findAll({ where: { id_producto } });
    },
};
