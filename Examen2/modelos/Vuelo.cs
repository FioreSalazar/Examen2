using System.Runtime.Serialization;

namespace Examen2.modelos
{
    [DataContract]
    public class Vuelo
    {
        [DataMember]
        public int Id { get; set; }
        [DataMember]
        public string Origen { get; set; }
        [DataMember]
        public string Destino{ get; set; }
        [DataMember]
        public string Agencia { get; set; }
        [DataMember]
        public string Categoria { get; set; }
        [DataMember]
        public int Precio { get; set; }
    }
}