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
			

			string query = String.Format("INSERT INTO subjects VALUES({0}, \'{1}\');", dict["subject_id"], dict["subject_name"]);
			Console.WriteLine(String.Format("\t{0}", query));
		}
		
		static void ParseCategory(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				
			string query = String.Format("INSERT INTO categories VALUES({0}, \'{1}\', {2});", dict["category_id"], dict["category_name"], dict["subject_id"]);
			Console.WriteLine(String.Format("\t{0}", query));
		}
		
		static void ParseSubcategory(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
			
			string query = String.Format("INSERT INTO subcategories VALUES({0}, \'{1}\', {2});", dict["subcategory_id"], dict["subcategory_name"], dict["category_id"]);
			Console.WriteLine(String.Format("\t{0}", query));
		}
		
		static void ParseTask(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
			
			string query = String.Format("INSERT INTO tasks VALUES({0}, \'{1}\', \'{2}\', {3}, {4}, {5});", dict["task_id"], dict["task_name"], dict["task_text"],
				dict["task_rate"], dict["subcategory_id"], dict["is_real"]);
			Console.WriteLine(String.Format("\t{0}", query));
		}
		
		static void ParseTest(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
				
				/*create table tests (
	test_id int,
	test_description text,
	test_date date,
	test_rate int,
	is_real bool
);*/	//	string query = String.Format("INSERT INTO tests VALUES({0}, \{1}, {2});"
		}
		
		static void ParseTaskInTest(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
			
			string query = String.Format("INSERT INTO tasks_in_tests VALUES({0}, {1}, {2});", dict["test_id"], dict["task_id"], dict["task_number"]);
			Console.WriteLine(String.Format("\t{0}", query));
		}
		
		static void ParseSolution(XmlNode node) {
			Dictionary<String, String> dict = new Dictionary<String, String>();
			for (int i = 0; i < node.ChildNodes.Count; i++)
				dict.Add(node.ChildNodes[i].Name, node.ChildNodes[i].InnerText);
				//Console.WriteLine(String.Format("\tname=[{0}] val=[{1}]", node.ChildNodes[i].Name, node.ChildNodes[i].InnerText));
		}
	}
}
