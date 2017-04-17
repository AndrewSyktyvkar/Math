using System;
using System.Xml;

namespace FillDb {
	class Program {
		static void Main(String[] args) {
			XmlDocument doc = new XmlDocument();
            doc.Load("tests.xml");
            XmlNode root = doc.GetElementsByTagName("xml")[0];
            
            for (int i = 0; i < root.ChildNodes.Count; i++) 
				ParseNode(root.ChildNodes[i]);
		}
		
		static void ParseNode(XmlNode node) {
			Console.WriteLine(node.Name);
		}
	}
}
