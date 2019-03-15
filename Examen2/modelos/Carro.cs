using System.Runtime.Serialization;

namespace Examen2.modelos
{
    [DataContract]
    public class Carro
    {
        [DataMember]
        public int Id { get; set; }
        [DataMember]
        public string Marca { get; set; }
        [DataMember]
        public string Modelo { get; set; }
        [DataMember]
        public string Categoria { get; set; }
        [DataMember]
        public string Color { get; set; }
        [DataMember]
        public int Precio { get; set; }
    }
}