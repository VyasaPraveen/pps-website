import type { MetadataRoute } from "next";
import { SITE } from "@/lib/site";

export default function sitemap(): MetadataRoute.Sitemap {
  const lastModified = new Date();
  const routes = ["", "about", "services", "projects", "gallery", "contact"];
  return routes.map((path) => ({
    url: `${SITE.url}${path ? `/${path}` : ""}`,
    lastModified,
    changeFrequency: "monthly",
    priority: path === "" ? 1 : 0.8,
  }));
}
