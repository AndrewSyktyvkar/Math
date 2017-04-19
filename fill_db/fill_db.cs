using System;
using System.Collections.Generic;
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
			string name = node.Name;
			
			Console.WriteLine(name);
			switch (name) {
			case "subject":
				ParseSubject(node);
				break;
			
			case "category":
				ParseCategory(node);
				break;
			case "subcategory":
				ParseSubcategory(node);
				break;
			case "task":
				ParseTask(node);
				break;
			case "test":
				ParseTest(node);
				break;
			case "task_in_test":
				ParseTaskInTest(node);
				break;
			case "solution":
				ParseSolution(node);
				break;
			}
		}
		
		static void ParseSubject(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
			
			string query = String.Format("INSERT INTO 
		}
		
		static void ParseCategory(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
		
		static void ParseSubcategory(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
		
		static void ParseTask(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
		
		static void ParseTest(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
		
		static void ParseTaskInTest(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
		
		static void ParseSolution(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
	}
}
