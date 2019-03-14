using System.Runtime.Serialization;

namespace Examen2.modelos
{
    [DataContract]
    public class Hotel
    {
        [DataMember]
        public int Id { get; set; }
        [DataMember]
        public string Nombre { get; set; }
        [DataMember]
        public string Telefono { get; set; }
        [DataMember]
        public string Ubicacion { get; set; }
        [DataMember]
        public string TipoHabitacion { get; set; }
        [DataMember]
        public int Precio { get; set; }
    }
}