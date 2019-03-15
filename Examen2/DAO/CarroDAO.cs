using Examen2.modelos;
using System.Collections.Generic;
using System.Data.SqlClient;

namespace Examen2.DAO
{
    public class CarroDAO
    {
        private string CadenaConexion = "Data Source=ALTESEIN\\SQLEXPRESS;Initial Catalog=Carros;Integrated Security=true;";

        public Carro Crear(Carro carroACrear)
        {
            Carro carroCreado = null;
            string sql = "INSERT INTO carros (marca, modelo, categoria, color, precio) " +
                "values(@marca, @modelo, @categoria, @color, @precio)";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@marca", carroACrear.Marca));
                    comando.Parameters.Add(new SqlParameter("@modelo", carroACrear.Modelo));
                    comando.Parameters.Add(new SqlParameter("@categoria", carroACrear.Categoria));
                    comando.Parameters.Add(new SqlParameter("@color", carroACrear.Color));
                    comando.Parameters.Add(new SqlParameter("@precio", carroACrear.Precio));
                    comando.ExecuteNonQuery();
                }
            }
            carroCreado = Obtener(carroACrear.Id);
            return carroCreado;
        }
        public Carro Obtener(int id)
        {
            Carro carroEncontrado = null;
            string sql = "SELECT * FROM carros WHERE id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@id", id));
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        if (resultado.Read())
                        {
                            carroEncontrado = new Carro()
                            {
                                Id = (int)resultado["id"],
                                Marca = (string)resultado["marca"],
                                Modelo= (string)resultado["modelo"],
                                Categoria = (string)resultado["categoria"],
                                Color = (string)resultado["color"],
                                Precio = (int)resultado["precio"]
                            };
                        }
                    }
                }

            }
            return carroEncontrado;
        }
        public Carro Modificar(Carro carroAModificar)
        {
            Carro carroModificado = null;
            string sql = "UPDATE carros SET marca = @marca, modelo = @modelo, categoria = @categoria,color=@color, precio = @precio where id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@marca", carroAModificar.Marca));
                    comando.Parameters.Add(new SqlParameter("@modelo", carroAModificar.Modelo));
                    comando.Parameters.Add(new SqlParameter("@categoria", carroAModificar.Categoria));
                    comando.Parameters.Add(new SqlParameter("@color", carroAModificar.Color));
                    comando.Parameters.Add(new SqlParameter("@precio", carroAModificar.Precio));
                    comando.Parameters.Add(new SqlParameter("@id", carroAModificar.Id));
                    comando.ExecuteNonQuery();
                }
            }
            carroModificado = Obtener(carroAModificar.Id);
            return carroModificado;
        }
        public void Eliminar(int Id)
        {
            string sql = "DELETE FROM carros WHERE id = @id";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@id", Id));
                    comando.ExecuteNonQuery();
                }
            }
        }
        public List<Carro> Listar()
        {
            List<Carro> carrosEncontrados = new List<Carro>();
           Carro carroEncontrado = null;
            string sql = "select * from carros";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            carroEncontrado = new Carro()
                            {
                                Id = (int)resultado["id"],
                                Marca = (string)resultado["marca"],
                                Modelo = (string)resultado["modelo"],
                                Categoria = (string)resultado["categoria"],
                                Color = (string)resultado["color"],
                                Precio = (int)resultado["precio"]
                            };
                            carrosEncontrados.Add(carroEncontrado);
                        }
                    }
                }
            }
            return carrosEncontrados;
        }
        public List<Carro> ListarCarrosPorUbicacionCategoria(string marca, string categoria)
        {
            List<Carro> carrosEncontrados = new List<Carro>();
            Carro carroEncontrado = null;
            string sql = "SELECT * FROM carros WHERE marca = @marca or categoria = @categoria";
            using (SqlConnection conexion = new SqlConnection(CadenaConexion))
            {
                conexion.Open();
                using (SqlCommand comando = new SqlCommand(sql, conexion))
                {
                    comando.Parameters.Add(new SqlParameter("@marca", marca));
                    comando.Parameters.Add(new SqlParameter("@categoria", categoria));
                    using (SqlDataReader resultado = comando.ExecuteReader())
                    {
                        while (resultado.Read())
                        {
                            carroEncontrado = new Carro()
                            {
                                Id = (int)resultado["id"],
                                Marca = (string)resultado["marca"],
                                Modelo = (string)resultado["modelo"],
                                Categoria = (string)resultado["categoria"],
                                Color = (string)resultado["color"],
                                Precio = (int)resultado["precio"]
                            };
                           carrosEncontrados.Add(carroEncontrado);
                        }
                    }
                }

            }
            return carrosEncontrados;
        }
    }
}